<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChooseRegPageController extends Controller
{
  public function index()
  {
    return view('auth.chooseReg');
  }
}
