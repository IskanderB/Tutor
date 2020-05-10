<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorRegPageController extends Controller
{
  public function index()
  {
    return view('auth.tutorReg');
  }
}
