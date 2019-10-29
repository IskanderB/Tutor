<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
  public function index()
  {
    $checkAccountPage = true;
    $user = Auth::user();

    return view('UserAccount.UserAccount', [
      'checkAccountPage' => $checkAccountPage,
      'user' => $user,
  ]);
  }

  public function studList()
  {
    $users = User::select('email', 'id')->where('id', '!=', Auth::id())->get();
    $checkAccountPage = true;
    return view('UserAccount.tutorAccount', [
      'checkAccountPage' => $checkAccountPage,
      'users' => $users
    ]);
  }
}
