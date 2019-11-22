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

      Message::dispatch($request->all());

      if($request->result){
        $paths = $image->messageOwn([
          'message_id' => $message_id,
          'images_id' => $request->result,
        ]);
        return json_encode(['paths' => $paths]);
      }
      // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
      // $out->writeln($paths);
      // $users = User::select('email', 'id')->where('id', '!=', Auth::id())->get();
      // $user = Auth::user();

    }
}
