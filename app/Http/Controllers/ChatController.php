<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Message;
use App\Chat;
use App\Image;
use Illuminate\Support\Facades\Auth;
use App\User;
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

    public function moreMessages(Request $request)
    {

      // $moreMessages = Chat::select()->whereBetween('id', [(int)$request->border_message_id + 1, (int)$request->border_message_id + 31])
      // ->get();
      $stud = User::select('id', 'full_name', 'name', 'is_tutor')->where('id', '=', $request->studid)->get();
      $resMessagesFromDB = Chat::select()->where([
        ['from_user', '=', Auth::id()],
        ['to_user', '=', $request->studid],
        ['id', '<', (int)$request->border_message_id],
        ])->orWhere([
          ['to_user', '=', Auth::id()],
          ['from_user', '=', $request->studid],
          ['id', '<', (int)$request->border_message_id],
          ])->orderBy('id', 'desc')->take(30)->get();

      $from = [
        $stud[0]->id,
        Auth::id()
      ];

      $authors = User::select('name', 'id', 'is_tutor')->whereIn('id', $from)->get();

      $messagesFromDB = [];

      foreach ($resMessagesFromDB as $value) {
        // $messagesFromDB[] = $value->from_user . ":" . $value->content;

        if($value->from_user == $authors[0]->id){
          $from_user = $authors[0]->name;
          $is_tutor = $authors[0]->is_tutor;
        }
        else{
          $from_user = $authors[1]->name;
          $is_tutor = $authors[1]->is_tutor;
        }



        if($is_tutor){
          $position = 'T';
        }
        else {
          $position = 'S';
        }

        $images_path = Image::select('path', 'type', 'name')->where('relationship', $value->id)->get();

        $messagesFromDB[] = array(
          'id_message' => $value->id,
          'from_user' => $from_user,
          'content' => $value->content,
          'time' => $value->created_at->format("H:i"),
          'full_time' => $value->created_at->format("Y-m-d H:i:s"),
          'position' => $position,
          'images_path' => $images_path,
        );
      }

      // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
      // $out->writeln(gettype($moreMessages));

      return json_encode($messagesFromDB);
    }
}
