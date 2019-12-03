<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    public function create($data)
    {
      $id = $this->insertGetId([
        'content' => $data['content'],
        'from_user' => $data['from_user'],
        'to_user' => $data['to_user'],
        'time_limit' => $data['time_limit'],
      ]);

      return $id;
    }
}
