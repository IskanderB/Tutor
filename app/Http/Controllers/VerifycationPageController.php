<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\EmailConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class VerifycationPageController extends Controller
{

  public function index(User $user, Request $request)
  {
    $token = $user->getConfirmationToken();
    //dd($user);

    //Mail::to(Auth::user()->email)->send(new EmailConfirmation($user, $token));

    return view('auth.verifycation', CustCheckAuthController::cust_chesk_auth());
  }

  public function confirm(User $user, $token)
  {

    //return view('auth.confirmation', CustCheckAuthController::cust_chesk_auth());
  }
}
