<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordChangeEmailPageController extends Controller
{
  public function index()
  {
    return view('auth.passwords.PasswordChangeEmailPage', CustCheckAuthController::cust_chesk_auth());
  }
}
