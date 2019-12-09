<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_answers extends Model
{
  public function create($data)
  {
    if($data['type'] != 'jpeg' and $data['type'] != 'png' and $data['type'] != 'gif'){
      $name = $data['name'];
    }
    else {
      $name = 'Image';
    }

    $this->insertGetId([
      'path' => asset('storage/'. $data['path']),
      'relationship' => $data['relationship'],
      'type' => $data['type'],
      'name' => $name,
    ]);

  }
}
