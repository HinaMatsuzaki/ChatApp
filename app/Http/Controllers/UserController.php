<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Language;
use App\Models\Hobby;
use Cloudinary;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // create profile
    public function create(Language $language, Hobby $hobby){
        // if文で過去に作成したかを確認（カラムにデータが入っているか確認）
        // 一度プロフィールを作成した人は、edit画面にリダイレクト
        
        return view('users/create')->with(['languages' => $language->get(), 'hobbies' => $hobby->get()]);;
    }
    
    // store user profiles
    public function store(UserRequest $request){
        $user = auth()->user();
        // send image to Cloudinary
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input = $request['user'];
        $user->fill($input);
        $user->image_path = $image_url;
        $user->save();
        
        $user->hobbies()->attach($request->input("hobbies"));
        
        return redirect("/profile/index");
    }

    // show profile
    public function show(Language $language)
    {
        $user = Auth::user();
        return view('users/show')->with(['user' => $user, 'languages' => $language->get()]);
    }
    
    // edit profile
    public function edit(User $user, Language $language, Hobby $hobby){
         $user = Auth::user();
         return view('users/edit')->with(['user' => $user, 'languages' => $language->get(), 'hobbies' => $hobby->get()]);
    }
    
    // update profile
    public function update (Request $request, User $user, Language $language){
        $input = $request['user'];
        // if the user updates their profile picture, add the new image path to $input
        if($request->file('image_path') != null){
            $image_url = Cloudinary::upload($request->file('image_path')->getRealPath())->getSecurePath();
            $input += array('image_path' => $image_url);
        }
        
        $user = User::find(auth()->id());
        $user->fill($input)->save();
        // if the user updates their hobbies, remove old hobbies and add new ones
        if($request->input("hobbies") != null){
            $user->hobbies()->detach();
            $user->hobbies()->attach($request->input("hobbies"));
        }
        return redirect('/profile/show');
    }
    
    // show user recommendations 
    public function index(Language $language){
        $user = Auth::user();
        // find users who speak the user's second language and learn the user's first language 
        $match_languages = User::where('languages_learn_id', $user->languages_native_id)
                                 ->where('languages_native_id', $user->languages_learn_id)->get();
        
        $auth_array = [];
        foreach($user->hobbies as $hobby){
            array_push($auth_array, $hobby->id);
        }
        // find users who have similar hobbies to the user's
        $similarity_list = [];
        $similar_users = [];
        foreach($match_languages as $user){
            $user_array = [];
            foreach($user->hobbies as $hobby){
                array_push($user_array, $hobby->id);
            }
            $matches = array_intersect($auth_array, $user_array);
            $a = round(count($matches));
            $b = count($auth_array);
            // calculate similarity of $auth_array to $matches
            $similarity = $a/$b*100;
            // create $similarity_list with user id as key and similarity as value 
            $similar_users[$user->id] = $user;
            $similar_users[$user->id]->similarity =  $similarity;
        }
        // sort users by similarity
        $col = array_column($similar_users, "similarity");
        array_multisort($col, SORT_DESC, $similar_users);
        
        return view('users/index')->with(['similar_users' => $similar_users, 'languages' => $language->get(), 'users' => User::with("follows")->get(), 'following_users_list' => auth()->user()->follows]);
    }
    
    // follow users
    public function follow(User $user)
    {
        auth()->user()->follows()->attach($user);
        return redirect(route("users.index"));
    }

    // unfollow users
    public function unfollow(User $user)
    {
        auth()->user()->follows()->detach($user);
        return redirect(route("users.index"));
    }
}


