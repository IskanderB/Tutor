<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
//use App\Http\Controllers\VerifycationPageController;

class EditUserDataController extends Controller
{
  public function upDate(User $user, Request $request)
  {
    $result = $user->edit($request);

    if($result){
      return redirect('/myaccount');
    }
    else {
      $user = CustCheckAuthController::cust_chesk_auth()['user'];
      return redirect()->route('verifycation', compact('user'));
    }
  }
}
