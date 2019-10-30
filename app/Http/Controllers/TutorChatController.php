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
      $stud = User::select('id', 'full_name')->where('id', '=', $request->studid)->get();
      //$resMessageFromDB = Chat::select()->where('from_user', '=', Auth::id())->where('to_user', '=', $request->studid)->get();
      $resMessagesFromDB = Chat::select()->where([
        ['from_user', '=', Auth::id()],
        ['to_user', '=', $request->studid],
        ])->orWhere([
          ['to_user', '=', Auth::id()],
          ['from_user', '=', $request->studid],
          ])->get();
      $messagesFromDB = [];
      foreach ($resMessagesFromDB as $value) {
        $messagesFromDB[] = $value->from_user . ":" . $value->content;
      }
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
