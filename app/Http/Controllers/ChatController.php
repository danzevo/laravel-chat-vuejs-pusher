<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\ChatEvent;
use Auth;

class ChatController extends Controller
{
    public function chat() 
    {
        return view('chat');
    }

    public function send(Request $request)  
    {
        $user = User::find(Auth::id());
        
        $this->saveToSession($request);

        event(new ChatEvent($request->message, $user));
    }

    public function saveToSession(Request $request)  
    {
        session()->put('chat', $request->chat);
    } 

    public function getOldMessage() {
        return session('chat');
    }

    public function deleteSession() {
        session()->forget('chat');
    }
}
