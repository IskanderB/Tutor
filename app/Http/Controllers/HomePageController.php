<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Mail\EmailConfirmation;
//use CustCheckAuthController;


class HomePageController extends Controller
{
    public function index(User $user)
    {
      // if (Auth::check()) {
      //   $check_user = TRUE;
      // }
      // else {
      //   $check_user = FALSE;
      // }
      //
      // $user = Auth::user();
      //
      //
      // return view('HomePage.index', [
      //   'check_user' => $check_user,
      //   'user' => $user
      // ]);
      //$a = CustCheckAuthController::cust();
      // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
      // $out->writeln("Hello from Terminal");
      return view('HomePage.index', CustCheckAuthController::cust_chesk_auth());
    }


}
