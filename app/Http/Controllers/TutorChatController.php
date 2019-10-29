<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class TutorChatController extends Controller
{
    public function redirect(Request $request)
    {
      $checkAccountPage = true;
      $stud = User::select('id', 'full_name')->where('id', '=', $request->studid)->get();
      // $stud = $request->studid;

      $user = Auth::user();
      return view('UserAccount.tutorChatRoom', [
        'checkAccountPage' => $checkAccountPage,
        'user' => $user,
        'stud' => $stud[0]
    ]);
    }
}
