<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tasks;
use Illuminate\Support\Facades\Auth;

class Answers extends Model
{
  public function create($data)
  {
    if(!$this->correctTaskId($data['number'])) return false;

    $id = $this->insertGetId([
      'content' => $data['content'],
      'from_user' => $data['from_user'],
      'to_user' => $data['to_user'],
      'relationship' => $data['number'],
    ]);
    $this->checked($data['number']);
    return $id;
  }

  public function correctTaskId($relationship)
  {


    if($this->correctTypeId($relationship) and $this->isSetTaskId($relationship) and $this->correctNotDouble($relationship)) return true;
    else return false;
  }

  public function correctTypeId($relationship)
  {
    $int_relationship = (int)$relationship;
    if(gettype($int_relationship) == 'integer' and $int_relationship != 0) return true;
    else return false;
  }

  public function isSetTaskId($relationship)
  {
    $task = new Tasks();
    return $task->correctTaskId($relationship);
  }

  public function correctNotDouble($relationship)
  {
    $check = $this->select('id')->where('relationship', '=', $relationship)->get();
    if(isset($check[0]->id)) return false;
    else return true;
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
        ['to_user', Auth::id()],
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
