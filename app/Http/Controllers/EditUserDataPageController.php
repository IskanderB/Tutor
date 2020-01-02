<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;

class EditUserDataPageController extends Controller
{
  public function index()
  {
    $count = new Tasks();
    return view('UserAccount.editUserData', ['count_new' => $count->countTask()]);
  }

}
