<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\Answers;

class CommentsController extends Controller
{
    public function append(Request $request, Comments $comment, Answers $answer)
    {

      if(!empty($request->grade) or !empty($request->comment)){
        $comment->append($request);
        $answer->checkAnswer($request->task_id_com);
      }
      elseif($request->check)
      $answer->checkAnswer($request->task_id_com);

      return redirect()->back();
    }
}
