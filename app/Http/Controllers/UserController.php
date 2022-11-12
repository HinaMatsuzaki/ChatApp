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
    public function index(Language $language){
        $user = Auth::user();
        $match_languages = User::where('languages_learn_id', $user->languages_native_id)
                                 ->where('languages_native_id', $user->languages_learn_id)->get();
        
        $auth_array = [];
        foreach($user->hobbies as $hobby){
            array_push($auth_array, $hobby->id);
        }
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
        //logger($sorted_list);
        
        return view('users/index')->with(['similar_users' => $similar_users, 'languages' => $language->get(), 'users' => User::with("follows")->get(), 'following_users_list' => auth()->user()->follows]);
    }
    
    public function create(Language $language, Hobby $hobby){
        // if文で過去に作成したかを確認（カラムにデータが入っているか確認）
        // 一度プロフィールを作成した人は、edit画面にリダイレクト
        
        return view('users/create')->with(['languages' => $language->get(), 'hobbies' => $hobby->get()]);;
    }
    
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

    public function show(Language $language)
    {
        $user = Auth::user();
        return view('users/show')->with(['user' => $user, 'languages' => $language->get()]);
        //return view("users.profile")->with(["user" => $user->load("follows", "followers")]);
    }

    public function follow(User $user)
    {
        auth()->user()->follows()->attach($user);
        return redirect(route("users.index"));
    }

    public function unfollow(User $user)
    {
        auth()->user()->follows()->detach($user);
        return redirect(route("users.index"));
    }
    
    public function edit(UserRequest $request, User $user)
    {
        $input_user = $request['user'];
        $user::find(auth()->id())->fill($input_user)->save();
        return view('users/edit')->with(['user' => $user, 'languages' => $language->get()]);
    }
}

//プロフィール作成ページの表示 (create)、保存処理 (store)
//編集ページの表示 (edit)、保存処理 (update)


