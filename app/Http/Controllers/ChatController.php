<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Message;
//use App\Events;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
      //dd("test2");
      //event(new Message($request->input('message')));
      Message::dispatch($request->all());

      return $request->all();
    }
}
