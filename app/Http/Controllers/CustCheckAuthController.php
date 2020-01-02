<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tasks;

class CustCheckAuthController extends Controller
{
    public static function cust_chesk_auth()
    {
      $count = new Tasks();
      if (Auth::check()) {
        $check_user = TRUE;
      }
      else {
        $check_user = FALSE;
      }

      $user = Auth::user();

      $auth_data = array(
        'check_user' => $check_user,
        'user' => $user,
        'count_new' => $count->countTask(),
     );

      return $auth_data;
    }
}
