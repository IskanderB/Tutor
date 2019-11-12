<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function upload(Request $request)
    {

    //  dd($request->image);
      $path = $request->file('image')->store('uploads', 'public');
      $relationship = $request->relationship;

      $image = new Image();
      $res = $image->create([
        'path' => $path,
        'relationship' => $relationship,
      ]);

      // $res = $image;
      // Image::create($path);
//dd($path);
      // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
      // $out->writeln($request->file('image'));

      // $fileName = time().'.'.$request->image->extension();
      // $request->image->move(public_path('uploads'), $fileName);


       return json_encode(['res' => $res]);
    }
}
