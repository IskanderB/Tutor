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

      // dd($tasksAndAnswers);
      return view('UserAccount.tasksPage', [
        'checkAccountPage' => true,
        'tasks_list' =>   $this->getLastTasks($request),
        'is_tutor' => Auth::user()->is_tutor,
      ]);
    }

    public function upload(Request $request)
    {
      if(Auth::user()->is_tutor){
        $this->uploadTask($request);
      }
      else{
        $this->uploadAnswer($request);
      }

      return redirect()->route('tasks', ['studid' => 2]);
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
        'quantity' => 10,
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
          [$task, File_tasks::select()->where('relationship', $task->id)->get()],
          [$answer = Answers::select()->where('relationship', $task->id)->get(), File_answers::select()->where('relationship', $answer[0]->id)->get()],
        ];
      }
      else{
        return [
          [$task, File_tasks::select()->where('relationship', $task->id)->get()],
          [$answer = Answers::select()->where('relationship', $task->id)->get()],
        ];
      }
    }
}
