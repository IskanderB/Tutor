<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
  public function index()
  {
    return view('UserAccount.UserAccount', CustCheckAuthController::cust_chesk_auth());
  }
}
