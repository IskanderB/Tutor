<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tasks;
use App\Friends;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
  public function index()
  {
    $checkAccountPage = true;
    $user = Auth::user();
    $count = new Tasks();
    return view('UserAccount.UserAccount', [
      'checkAccountPage' => $checkAccountPage,
      'user' => $user,
      'count_new' => $count->countTask(),
  ]);
  }

  public function studList()
  {
    $users = User::select('name', 'id', 'is_tutor')->where('id', '!=', Auth::id())->get();

    $checkAccountPage = true;
    $count = new Tasks();
    return view('UserAccount.tutorAccount', [
      'checkAccountPage' => $checkAccountPage,
      'users' => $users,
      'count_new' => $count->countTask(),
      'friends' => $this->checkFriends(),
    ]);
  }

  public function checkFriends()
  {
    $friends_Friends = Friends::select('first_id', 'second_id')->where('first_id', Auth::id())->orWhere('second_id', Auth::id())->get();
    $friends_id = [];
    foreach ($friends_Friends as $friend) {
      if($friend->first_id == Auth::id())
      $friends_id[] = $friend->second_id;
      else
      $friends_id[] = $friend->first_id;
    }
    return User::select('name', 'id', 'is_tutor')->whereIn('id', $friends_id)->get();
  }
}
