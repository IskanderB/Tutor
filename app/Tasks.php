<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Answers;

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

    public function updateTask($data)
    {
      $this->where('id', $data['task_id'])->update([
        'content' => $data['content'],
        'from_user' => $data['from_user'],
        'to_user' => $data['to_user'],
        'time_limit' => $data['time_limit'],
        'name' => $data['name'],
      ]);

    }

    public function countTask()
    {
      if(Auth::check()){
        if(!Auth::user()->is_tutor)
        $count = $this->where([
            ['to_user', Auth::id()],
            ['check', null],
          ])->count();

        else{
          $answer_check = new Answers();
          $count = $answer_check->countAnswer();
        }
      }
      else return false;
        return $count;
    }
}
