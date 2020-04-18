<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use App\Answers;
use App\File_tasks;
use App\File_answers;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App;

class TasksPageController extends Controller
{

    public function index(Request $request)
    {

      $count = new Tasks();
      // $date = date_create('2000-01-01');
      // echo date_format($date, 'Y-m-d H:i:s');
      // $a = $this->getLastTasks($request);
      // dd($a[9]['answer']['answer_cont']['updated_at']->format("Y-m-d H:i"));
      return view('UserAccount.tasksPage', [
        'checkAccountPage' => true,
        'tasks_list' => $this->getLastTasks($request),
        'is_tutor' => Auth::user()->is_tutor,
        'count_new' => $count->countTask(),
        'studid' => $request->studid,
        'stud_name' => $this->getName($request->studid),
      ]);
    }

    private function getName($studid)
    {
      $name = new User();
      return $name->getUser($studid)[0]->full_name;
    }

    public function upload(Request $request)
    {
      // dd($request->check_change == "on");
      if(Auth::user()->is_tutor){
        if($request->check_change == "on")
        $this->updateTask($request);
        else
        $this->uploadTask($request);
      }
      else{
        if($request->check_change == "on")
        $this->updateAnswer($request);
        else{
          $flag = $this->uploadAnswer($request);
          if(!$flag) return redirect()->route('tasks',[
            'studid' => 1,
            'quantity' => 10,
            'flag' => 'Error',
          ]);
        }
      }
      return redirect()->back();
    }

    public function uploadTask($request)
    {
      if(!$this->checkLengthTask($request)) die('Упс(');
      $task = new Tasks();
      $id = $task->create([
        'from_user' => Auth::id(),
        'to_user' => $request->studid,
        'content' => $request->content,
        'time_limit' => $request->date,
        'name' => $request->name,
      ]);

      if($request->file('files')){
        $this->appendFile($request, $id);
      }
    }

    public function uploadAnswer($request)
    {
      if(!$this->checkLengthAnswer($request)) die('Упс(');
      $answer = new Answers();
      $id = $answer->create([
        'from_user' => Auth::id(),
        'to_user' => $request->studid,
        'content' => $request->content,
        'number' => $request->number,
      ]);

      if(!$id) return false;

      if($request->file('files')){
        $this->appendFile($request, $id);
      }
      return true;
    }

    public function appendFile($request, $id)
    {

      // $path = $request->file('files')->store('task_files', 'public');
      $paths = [];
      foreach ($request->file('files') as $value) {
        $paths[] = [
          'path' => $value->store('task_files', 'public'),
          'relationship' => $id,
          'type' => $value->extension(),
          'name' => $value->getClientOriginalName(),
        ];
      }


      if(Auth::user()->is_tutor){
        $file = new File_tasks();
      }
      else{
        $file = new File_answers();
      }

      $file->create($paths);
    }

    public function getLastTasks($request)
    {
//       $test = \DB::select("SELECT T.id id_t, T.from_user, T.to_user, A.relationship, A.id, A.to_user, A.from_user FROM `tasks` T
// LEFT OUTER JOIN answers A
// ON T.id = A.relationship
// WHERE (T.to_user = 1 AND T.from_user = 2) OR (T.to_user = 2 AND T.from_user = 1)
// ORDER BY T.created_at;");
// dd($test);
      // $test = \DB::table('tasks')
      // ->Leftjoin('answers', 'tasks.id', '=', 'answers.relationship')
      // ->select('tasks.id as t_id', 'tasks.from_user as t_from', 'tasks.to_user as t_to', 'tasks.content as t_content',
      // 'tasks.time_limit as t_t_limit', 'tasks.name as t_name', 'tasks.check as t_check', 'tasks.mark as t_mark',
      // 'answers.updated_at as a_updated_at', 'answers.content as a_content', 'answers.check as a_check', 'answers.mark as a_mark',
      // 'answers.id as a_id',)
      // ->where([
      //   ['tasks.to_user', '=', 1],
      //   ['tasks.from_user', '=', 2],
      // ])
      // ->orWhere([
      //   ['tasks.to_user', '=', 2],
      //   ['tasks.from_user', '=', 1],
      // ])
      // ->orderBy('tasks.created_at')
      // ->get();
      //
      // $test2 = [];
      // foreach ($test as $value) {
      //   $test2[] = $value->t_id;
      // }
      //
      // $test4 = [];
      // foreach ($test as $value) {
      //   if($value->a_id != NULL) $test4[] = $value->a_id;
      // }
      //
      // $test3 = \DB::select("SELECT * FROM (SELECT T.relationship, T.name, T.path, T.type FROM file_tasks T
      //  GROUP BY T.relationship, T.name, T.path, T.type) F
      // WHERE relationship IN (".implode(',', $test2).")");
      //
      // $test5 = \DB::select("SELECT * FROM (SELECT T.relationship, T.name, T.path, T.type FROM file_answers T
      //  GROUP BY T.relationship, T.name, T.path, T.type) F
      // WHERE relationship IN (".implode(',', $test4).")");
      //
      //
      // $arr_test = [];
      // foreach ($test as  $value) {
      //   $arr_test[] = [
      //     'task' => [
      //       'task_cont' => [
      //       'id' => $value->t_id,
      //       'from_user' => $value->t_from,
      //       'to_user' => $value->t_to,
      //       'content' => $value->t_content,
      //       'time_limit' => $value->t_t_limit,
      //       'name' => $value->t_name,
      //       'check' => $value->t_check,
      //       'mark' => $value->t_mark,
      //     ],
      //       'task_files' => $this->getTaskFiles($value->t_id, $test3),
      //     ],
      //     'answer' =>  [
      //       'answer_cont' =>  [
      //         'id' => $value->a_id,
      //         'updated_at' => $value->a_updated_at,
      //         'content' => $value->a_content,
      //         'check' => $value->a_check,
      //         'mark' => $value->a_mark,
      //     ],
      //       'answer_files' => $this->getTaskFiles($value->a_id, $test5),
      //     ],
      //   ];
      // }
      // dd($arr_test);
      $task = new Tasks();
      $tasks_db = $task->getLastTasks([
        'from_user' => Auth::id(),
        'to_user' => $request->studid,
        'quantity' => $request->quantity,
      ]);
      // dd($tasks_db);
      return $tasks_db;
    }

    // public function getTaskFiles($id, $arr_data)
    // {
    //   foreach ($arr_data as $key => $value) {
    //     if($value->relationship != $id) unset($arr_data[$key]);
    //   }
    //   return $arr_data;
    // }
    //
    // public function makeIdArr($tasks_db, $type)
    // {
    //   $ids = [];
    //   if($type == 'task'){
    //     foreach ($tasks_db as $value) {
    //       if($value->t_id != NULL) $ids[] = $value->t_id;
    //     }
    //   }
    //   elseif($type == 'answer') {
    //     foreach ($tasks_db as $value) {
    //       if($value->a_id != NULL) $ids[] = $value->a_id;
    //     }
    //   }
    //   return $ids;
    // }

    // public function tasksAndAnswersConstr($task)
    // {
    //   if($task->check){
    //     return [
    //         'task' =>  [
    //           'task_cont' =>  $task,
    //           'task_files' =>  File_tasks::select()->where('relationship', $task->id)->get()
    //         ],
    //         'answer' =>  [
    //           'answer_cont' =>  $answer = Answers::select()->where('relationship', $task->id)->get(),
    //           'answer_files' =>  File_answers::select()->where('relationship', $answer[0]->id)->get()
    //         ],
    //     ];
    //   }
    //   else{
    //     return [
    //         'task' =>  [
    //           'task_cont' =>  $task,
    //           'task_files' =>  File_tasks::select()->where('relationship', $task->id)->get()
    //         ],
    //         'answer' =>  [
    //           'answer_cont' =>  $answer = Answers::select()->where('relationship', $task->id)->get(),
    //         ],
    //     ];
    //   }
    // }

    public function updateTask($request)
    {
      if(!$this->checkLengthTask($request)) die('Упс(');
      $updateTask = new Tasks();
      $updateTask->updateTask([
        'from_user' => Auth::id(),
        'to_user' => $request->studid,
        'content' => $request->content,
        'time_limit' => $request->date,
        'name' => $request->name,
        'task_id' => $request->task_id,
      ]);

      if($request->check_delet == "on")
      $this->deleteFiles($request->task_id);

      if($request->file('files')){
        $this->appendFile($request, $request->task_id);
      }

    }

    public function deleteFiles($id)
    {
      // dd("Test");
      if(Auth::user()->is_tutor){
        $file = new File_tasks();
        $file->deleteFiles($id);
      }
      else {
        $file = new File_answers();
        $file->deleteFiles($id);
      }

    }

    public function updateAnswer($request)
    {
      if(!$this->checkLengthAnswer($request)) die('Упс(');
      $answer = new Answers();
      $id = $answer->updateAnswer([
        'from_user' => Auth::id(),
        'to_user' => $request->studid,
        'content' => $request->content,
        'number' => $request->number,
      ]);

      if($request->check_delet == "on")
      $this->deleteFiles($id);

      if($request->file('files')){
        $this->appendFile($request, $id);
      }
    }

    public function getAnswer($relationship)
    {

    }

    public function checkLengthTask($request)
    {
      $lengths = [
        'name' => 130,
        'content' => 4000,
      ];
      foreach ($lengths as $key => $value) {
        if(strlen($request[$key]) > $value) return false;
      }
      if(!empty($request->file('files'))) if(count($request->file('files')) > 20) return false;
      return true;
    }

    public function checkLengthAnswer($request)
    {
      $lengths = [
        'number' => 9999999999,
        'content' => 4000,
      ];
      if($request['number'] > $lengths['number']) return false;
      if(strlen($request['content']) > $lengths['content']) return false;
      if(!empty($request->file('files'))) if(count($request->file('files')) > 20) return false;
      return true;
    }

    public function checkLengthCheck($request)
    {
      $lengths = [
        'grade' => 1,
        'comment' => 1000,
      ];
      if(strlen($request['grade']) > $lengths['grade']) return false;
      if(strlen($request['comment']) > $lengths['comment']) return false;
      return true;
    }
}
