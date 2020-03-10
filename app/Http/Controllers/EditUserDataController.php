<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
//use App\Http\Controllers\VerifycationPageController;

class EditUserDataController extends Controller
{
  public function upDate(User $user, Request $request)
  {
    if($this->checkLength($request)){
      $result = $user->edit($request);

      if($result){
        return redirect('/tutoraccount');
      }
      else {
        $user = CustCheckAuthController::cust_chesk_auth()['user'];
        return redirect()->route('verifycation', compact('user'));
      }
    }
    else{
      return redirect('/');
    }

  }

  public function checkLength($request)
  {
    $lengths = [
      'number_phone'=>30,
      'full_name'=>50,
      'address'=>140,
      'number_school'=>30,
      'number_class'=>10,
      'subject'=>40,
      'mark'=>50,
      'goal'=>200,
    ];

    foreach ($lengths as $key => $value) {
      if(strlen($request[$key]) > $value){
        return false;
      }
      return true;
    }
  }
}
