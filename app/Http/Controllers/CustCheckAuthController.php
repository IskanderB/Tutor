<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustCheckAuthController extends Controller
{
    public static function cust_chesk_auth()
    {
      if (Auth::check()) {
        $check_user = TRUE;
      }
      else {
        $check_user = FALSE;
      }

      $user = Auth::user();

      $auth_data = array(
        'check_user' => $check_user,
        'user' => $user
     );

      return $auth_data;
    }
}
