<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
      if (Auth::check()) {
        $check_user = TRUE;
      }
      else {
        $check_user = FALSE;
      }

      return view('HomePage.index', [
        'check_user' => $check_user
      ]);
    }
}
