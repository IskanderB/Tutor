<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tasks;

class Answers extends Model
{
  public function create($data)
  {
    $id = $this->insertGetId([
      'content' => $data['content'],
      'from_user' => $data['from_user'],
      'to_user' => $data['to_user'],
      'relationship' => $data['number'],
    ]);
    $this->checked($data['number']);
    return $id;
  }

  public function checked($number)
  {
    $task = new Tasks();
    $task->checked($number);
  }
}
