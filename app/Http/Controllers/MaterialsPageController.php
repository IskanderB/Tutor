<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;

class MaterialsPageController extends Controller
{
  public function index()
  {
    $count = new Tasks();
    return view('materials.materials', ['count_new' => $count->countTask()]);
  }

}
