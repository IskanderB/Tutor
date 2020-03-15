<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Answers;
use App\File_tasks;
use App\File_answers;

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
      // $result = $this->select()->where([
      //   ['from_user', '=', $data['from_user']],
      //   ['to_user', '=', $data['to_user']],
      //   ])->orWhere([
      //     ['to_user', '=', $data['from_user']],
      //     ['from_user', '=', $data['to_user']],
      //     ])->orderBy('id', 'desc')->take($data['quantity'])->get();

      $tasks_db = \DB::table('tasks')
      ->Leftjoin('answers', 'tasks.id', '=', 'answers.relationship')
      ->select('tasks.id as t_id', 'tasks.from_user as t_from', 'tasks.to_user as t_to', 'tasks.content as t_content',
      'tasks.time_limit as t_t_limit', 'tasks.name as t_name', 'tasks.check as t_check', 'tasks.mark as t_mark',
      'answers.updated_at as a_updated_at', 'answers.content as a_content', 'answers.check as a_check', 'answers.mark as a_mark',
      'answers.id as a_id', 'answers.relationship as a_relationship',)
      ->where([
        ['tasks.to_user', '=',  $data['from_user']],
        ['tasks.from_user', '=', $data['to_user']],
      ])
      ->orWhere([
        ['tasks.to_user', '=', $data['to_user']],
        ['tasks.from_user', '=',  $data['from_user']],
      ])
      ->orderBy('tasks.created_at', 'desc')
      ->take($data['quantity'])
      ->get();

      $result = $this->constrTasksList($tasks_db);

      return array_reverse($result);
    }

    public function constrTasksList($tasks_db)
    {
      $file_tasks = new File_tasks();
      $files_t = $file_tasks->getFiles($this->makeIdArr($tasks_db, 'task'));

      $file_answers = new File_answers();
      $files_a = $file_answers->getFiles($this->makeIdArr($tasks_db, 'answer'));

      $arr_res = [];
      foreach ($tasks_db as  $value) {
        $arr_res[] = [
          'task' => [
            'task_cont' => [
            'id' => $value->t_id,
            'from_user' => $value->t_from,
            'to_user' => $value->t_to,
            'content' => $value->t_content,
            'time_limit' => $value->t_t_limit,
            'name' => $value->t_name,
            'check' => $value->t_check,
            'mark' => $value->t_mark,
          ],
            'task_files' => $this->getTaskFiles($value->t_id, $files_t),
          ],
          'answer' =>  [
            'answer_cont' =>  [
              'id' => $value->a_id,
              'updated_at' => date_create($value->a_updated_at),
              'content' => $value->a_content,
              'check' => $value->a_check,
              'mark' => $value->a_mark,
              'relationship' => $value->a_relationship,
          ],
            'answer_files' => $this->getTaskFiles($value->a_id, $files_a),
          ],
        ];
      }
      return $arr_res;
    }

    public function getTaskFiles($id, $arr_data)
    {
      foreach ($arr_data as $key => $value) {
        if($value->relationship != $id) unset($arr_data[$key]);
      }
      return $arr_data;
    }

    public function makeIdArr($tasks_db, $type)
    {
      $ids = [];
      if($type == 'task'){
        foreach ($tasks_db as $value) {
          if($value->t_id != NULL) $ids[] = $value->t_id;
        }
      }
      elseif($type == 'answer') {
        foreach ($tasks_db as $value) {
          if($value->a_id != NULL) $ids[] = $value->a_id;
        }
      }
      return $ids;
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
