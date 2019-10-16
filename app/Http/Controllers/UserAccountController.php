<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
  public function index()
  {
    $checkAccountPage = true;
    return view('UserAccount.UserAccount', [
      'checkAccountPage' => $checkAccountPage,
  ]);
  }
}
