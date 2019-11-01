<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chat;
use Illuminate\Support\Facades\Auth;


class TutorChatController extends Controller
{
    public function redirect(Request $request)
    {
      $checkAccountPage = true;
      $stud = User::select('id', 'full_name', 'name', 'is_tutor')->where('id', '=', $request->studid)->get();
      $resMessageFromDB = Chat::select()->where('from_user', '=', Auth::id())->where('to_user', '=', $request->studid)->get();
      $resMessagesFromDB = Chat::select()->where([
        ['from_user', '=', Auth::id()],
        ['to_user', '=', $request->studid],
        ])->orWhere([
          ['to_user', '=', Auth::id()],
          ['from_user', '=', $request->studid],
          ])->get();
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

        $messagesFromDB[] = array(
          'from_user' => $from_user,
          'content' => $value->content,
          'time' => $value->created_at->format("H:i"),
          'full_time' => $value->created_at->format("Y-m-d H:i:s"),
          'position' => $position,
        );
      }

      // $messagesFromDB[0]['time']->format('d.m.Y');
      // dd($messagesFromDB[0]['time']->format('d.m.Y'));

      // $stud = $request->studid;

      $user = Auth::user();
      return view('UserAccount.tutorChatRoom', [
        'checkAccountPage' => $checkAccountPage,
        'user' => $user,
        'stud' => $stud[0],
        'messagesFromDB' => json_encode($messagesFromDB),
    ]);
    }
}
