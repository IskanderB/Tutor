<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tasks;
use Illuminate\Support\Facades\Auth;

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

  public function updateAnswer($data)
  {
    $this->where('relationship', $data['number'])->update([
      'content' => $data['content'],
    ]);

    return $this->select()->where('relationship', $data['number'])->get()[0]->id;
  }

  public function countAnswer()
  {
    $count = $this->where([
        ['from_user', Auth::id()],
        ['check', null],
      ])->count();

      return $count;
  }

  public function checkAnswer($id)
  {
    $this->where('relationship', $id)->update([
      'check' => true,
    ]);
  }
}
