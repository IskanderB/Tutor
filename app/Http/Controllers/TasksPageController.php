<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use App\Answers;
use App\File_tasks;
use App\File_answers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TasksPageController extends Controller
{

    public function index(Request $request)
    {
      $count = new Tasks();
      // dd(count($this->getLastTasks($request)));
      return view('UserAccount.tasksPage', [
        'checkAccountPage' => true,
        'tasks_list' => $this->getLastTasks($request),
        'is_tutor' => Auth::user()->is_tutor,
        'count_new' => $count->countTask(),
      ]);
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
        else
        $this->uploadAnswer($request);
      }

      return redirect()->back();
    }

    public function uploadTask($request)
    {
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
      $answer = new Answers();
      $id = $answer->create([
        'from_user' => Auth::id(),
        'to_user' => $request->studid,
        'content' => $request->content,
        'number' => $request->number,
      ]);
      if($request->file('files')){
        $this->appendFile($request, $id);
      }
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
      $task = new Tasks();
      $tasks_db = $task->getLastTasks([
        'from_user' => Auth::id(),
        'to_user' => $request->studid,
        'quantity' => $request->quantity,
      ]);
      $tasksAndAnswers = [];
      foreach ($tasks_db as $value) {
        //   $tasksAndAnswers[] = [
        //     [$value, File_tasks::select()->where('relationship', $value->id)],
        //     [$answer = Answers::select()->where('relationship', $value->id)->get(), File_answers::select()->where('relationship', $answer->id)],
        // ];
        $tasksAndAnswers[] = $this->tasksAndAnswersConstr($value);
      }
      // dd($tasksAndAnswers);
      return array_reverse($tasksAndAnswers);
    }

    public function tasksAndAnswersConstr($task)
    {
      if($task->check){
        return [
            'task' =>  [
              'task_cont' =>  $task,
              'task_files' =>  File_tasks::select()->where('relationship', $task->id)->get()
            ],
            'answer' =>  [
              'answer_cont' =>  $answer = Answers::select()->where('relationship', $task->id)->get(),
              'answer_files' =>  File_answers::select()->where('relationship', $answer[0]->id)->get()
            ],
        ];
      }
      else{
        return [
            'task' =>  [
              'task_cont' =>  $task,
              'task_files' =>  File_tasks::select()->where('relationship', $task->id)->get()
            ],
            'answer' =>  [
              'answer_cont' =>  $answer = Answers::select()->where('relationship', $task->id)->get(),
            ],
        ];
      }
    }

    public function updateTask($request)
    {
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
      // dd($request->request);
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
}
