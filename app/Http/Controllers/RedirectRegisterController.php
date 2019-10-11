<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RedirectRegisterController extends Controller
{
    public function redirecrRegister()
    {
    // dd(compact('user'));
      //return redirect()->route('verifycation', ['user' => $request->user()]);
      // $users = User::all();
      // dd($users);
      $user = CustCheckAuthController::cust_chesk_auth()['user'];

      //dd($test['user']->id);
      //dd(compact('user'));
      return redirect()->route('verifycation', compact('user'));
    }
}
