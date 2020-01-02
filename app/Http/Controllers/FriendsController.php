<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friends;

class FriendsController extends Controller
{
    public function append(Request $request, Friends $friend)
    {
      $friend->append($request->friend_id);

      return redirect()->route('tutoraccount');
    }

    public function delete(Request $request, Friends $friend)
    {
      $friend->deleteFriend($request->friend_id);

      return redirect()->route('tutoraccount');
    }
}
