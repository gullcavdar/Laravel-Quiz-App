<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {

        $chats = Chat::all()->load('chatSender');
        return view('chat', ['chats' => $chats]);
    }

    public function messages()
    {
        $chats = Chat::all();
        return $chats;
    }

    public function saveMessage(Request $request)
    {

        $chat = new Chat();
        $chat->user_id = Auth::id();
        $chat->message = $request->message;
        $chat->save();
        $chat->sender = Auth::user()->name;
        return $chat;
    }
}
