<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RedirectRegisterController extends Controller
{
    public function redirecrRegister(User $user)
    {
    dd(compact('user'));
      //return redirect()->route('verifycation', ['user' => $request->user()]);
      // $users = User::all();
      // dd($users);
      return redirect()->route('verifycation', compact('user'));
    }
}
