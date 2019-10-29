<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Message;
use App\Chat;
//use App\Events;

class ChatController extends Controller
{
    public function sendMessage(Request $request, Chat $chat)
    {
      //dd("test2");
      //event(new Message($request->input('message')));
      $res = $chat->appendChat($request);
      Message::dispatch($request->all());
      // $users = User::select('email', 'id')->where('id', '!=', Auth::id())->get();
      // $user = Auth::user();
      return $request->all();
    }
}
