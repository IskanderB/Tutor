<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Chat;
use App\Image;
use Illuminate\Support\Facades\Auth;
use App\Tasks;


class TutorChatController extends Controller
{
    public function redirect(Request $request)
    {
      $checkAccountPage = true;
      $stud = User::select('id', 'full_name', 'name', 'is_tutor', \DB::raw("CONCAT('/userPage/',id) as page_path"))
      ->where('id', '=', $request->studid)->get();
      $resMessagesFromDB = Chat::select()->where([
        ['from_user', '=', Auth::id()],
        ['to_user', '=', $request->studid],
        ])->orWhere([
          ['to_user', '=', Auth::id()],
          ['from_user', '=', $request->studid],
          ])->orderBy('id', 'desc')->take(30)->get();
        $from = [
          $stud[0]->id,
          Auth::id()
        ];
        $authors = User::select('name', 'id', 'is_tutor')->whereIn('id', $from)->get();

      $messagesFromDB = [];
      // $messagesId = [];
      //
      // foreach ($resMessagesFromDB as $value) {
      //   $messagesId[] = $value->id;
      // }
      //
      // $images_path = Image::select()->whereIn('relationship', $messagesId)->get();

      foreach ($resMessagesFromDB as $value) {
        // $messagesFromDB[] = $value->from_user . ":" . $value->content;

        if($value->from_user == $authors[0]->id){
          $from_user = $authors[0]->name;
          $is_tutor = $authors[0]->is_tutor;
          $page_path = "/userPage/{$authors[0]->id}";
        }
        else{
          $from_user = $authors[1]->name;
          $is_tutor = $authors[1]->is_tutor;
          $page_path = "/userPage/{$authors[1]->id}";
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
          'page_path' => $page_path,
        );
      }

      // $messagesFromDB[0]['time']->format('d.m.Y');
      // dd($messagesFromDB[0]['time']->format('d.m.Y'));

      // $stud = $request->studid;

      $user = Auth::user();
      $count = new Tasks();
      return view('UserAccount.tutorChatRoom', [
        'checkAccountPage' => $checkAccountPage,
        'user' => $user,
        'stud' => $stud[0],
        'messagesFromDB' => json_encode(array_reverse($messagesFromDB)),
        'count_new' => $count->countTask(),
        // 'images_path' => json_encode($images_path),
    ]);
    }
}
