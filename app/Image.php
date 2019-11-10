<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    public function create($data)
    {

      $this->insert([
        'path' => $data['path'],
        'relationship' => $data['relationship'],
      ]);
    }

}
