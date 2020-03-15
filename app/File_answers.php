<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_answers extends Model
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

  public function getFiles($ids)
  {
    $files = \DB::select("SELECT * FROM (SELECT T.relationship, T.name, T.path, T.type FROM file_tasks T
     GROUP BY T.relationship, T.name, T.path, T.type) F
    WHERE relationship IN (".implode(',', $ids).")");

    return $files;
  }
}
