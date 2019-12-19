<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_tasks extends Model
{
  public function create($test)
  {
    foreach ($test as $data) {
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

  public function deleteFiles($id)
  {
    $this->where('relationship', $id)->delete();
  }
}
