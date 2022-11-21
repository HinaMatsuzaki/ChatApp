<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Language $language)
    {
        // people that the user is following 
        $user = auth()->user()->follows;
        
        $followers = auth()->user()->followers;
        $follows = auth()->user()->follows;
        // followers that the user is not following
        $follow_requests = $followers->diff($follows);
        
        return view("message/index")->with(["users" => $user, "follow_requests" => $followers->diff($follows), 'languages' => $language->get()]);
    }

    public function store(Request $request, Message $message)
    {
        $message->fill($request->all())->save();
        return redirect(route("messages.show", $message->receiver_id));
    }

    public function show($user_id)
    {
        // get the user whose user id is $user_id
        $user = User::find($user_id);
        // 送信者が自分で受信者がA、送信者がAで受信者が自分のデータを昇順で取得
        $messages = Message::where([["sender_id", auth()->id()], ["receiver_id", $user_id]])
            ->orWhere([["sender_id", $user_id], ["receiver_id", auth()->id()]])
            ->orderBy("created_at", "asc")->get();
        

        return view("message/show")->with(["receiver_id" => $user_id, "messages" => $messages, "user" => $user]);
    }
    
    
    public function followBack(User $user)
    {
        auth()->user()->follows()->attach($user);
        return redirect("/messages");
    }
    
}
