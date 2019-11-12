<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Message;
use App\Chat;
use App\Image;
//use App\Events;

class ChatController extends Controller
{
    public function sendMessage(Request $request, Chat $chat, Image $image)
    {
      //dd("test2");
      //event(new Message($request->input('message')));
      $message_id = $chat->appendChat($request);
      $out = new \Symfony\Component\Console\Output\ConsoleOutput();
      $out->writeln($request->result);
      $image->messageOwn([
        'message_id' => $message_id,
        'images_id' => $request->result,
      ]);
      Message::dispatch($request->all());
      // $users = User::select('email', 'id')->where('id', '!=', Auth::id())->get();
      // $user = Auth::user();
      return $request->all();
    }
}
