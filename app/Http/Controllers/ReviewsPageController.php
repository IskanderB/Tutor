<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;

class ReviewsPageController extends Controller
{
  public function index()
  {
    $count = new Tasks();
    return view('reviews.reviews', ['count_new' => $count->countTask()]);
  }

}
