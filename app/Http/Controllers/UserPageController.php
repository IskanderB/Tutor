<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tasks;
use App\Friends;
use Illuminate\Support\Facades\Auth;

class UserPageController extends Controller
{
  public function index(Request $request)
  {
    $checkAccountPage = true;
    $user = Auth::user();
    $count = new Tasks();
    return view('UserAccount.userPage', [
      'checkAccountPage' => $checkAccountPage,
      'user' => $user,
      'count_new' => $count->countTask(),
      'userPageInfo' => $this->getUserPageInfo($request->user_id),
      'is_friends' => $this->isFriends($request->user_id),
  ]);
  }

  private function getUserPageInfo($id)
  {
    $user = new User();
    return $user->getUser($id)[0];
  }

  private function isFriends($id)
  {
    $is_friends = new Friends();
    return $is_friends->isFriends($id);
  }
}
