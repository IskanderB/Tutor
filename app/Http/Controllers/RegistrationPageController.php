<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationPageController extends Controller
{
    public function index()
    {
      return view('auth.registration', CustCheckAuthController::cust_chesk_auth());
    }
}
