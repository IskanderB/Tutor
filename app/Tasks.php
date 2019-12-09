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
        'name' => $data['name'],
      ]);

      return $id;
    }

    public function getLastTasks($data)
    {
      $result = $this->select()->where([
        ['from_user', '=', $data['from_user']],
        ['to_user', '=', $data['to_user']],
        ])->orWhere([
          ['to_user', '=', $data['from_user']],
          ['from_user', '=', $data['to_user']],
          ])->orderBy('id', 'desc')->take($data['quantity'])->get();

      return $result;
    }

    public function checked($id)
    {
      $this->where('id', $id)->update([
        'check' => true,
      ]);
    }
}
