<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Message;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
      //dd("test2");
      event(new Message($request->input('message')));
    }
}
