<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\EmailConfirmation;
use Illuminate\Support\Facades\Mail;

class VerifycationPageController extends Controller
{
  public function index(User $user, Request $request)
  {
    $token = $user->getConfirmationToken();
    dd($token);

    //Mail::to($user->email)->send(new EmailConfirmation($user, $token));

    return view('auth.verifycation', CustCheckAuthController::cust_chesk_auth());
  }

  public function confirm()
  {
    return view('auth.confirmation', CustCheckAuthController::cust_chesk_auth());
  }
}
