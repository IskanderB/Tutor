<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use Illuminate\Support\Facades\Auth;

class TasksPageController extends Controller
{
    public function index()
    {
      $checkAccountPage = true;
      return view('UserAccount.tasksPage', [
        'checkAccountPage' => $checkAccountPage,
      ]);
    }

    public function upload(Request $request, Tasks $task)
    {
      $id = $task->create([
        'from_user' => Auth::id(),
        'to_user' => $request->studid,
        'content' => $request->content,
        'time_limit' => $request->date,
      ]);
      dd($id);
    }
}
