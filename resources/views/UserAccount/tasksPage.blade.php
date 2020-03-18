@extends('layout')

@section('content')
  <div class="col-lg-9">
    <div class="card">
      <div class="card-header">Задания</div>

      <div class="card-body">
        <div class="col-lg-10 tasks_box offset-lg-1" id='tasks_box'>
          @if(substr((string)count($tasks_list), -1) == "0")
          <div class="more_task_box d-flex">
            <div class="more_task">
              <a href="/user/{{$studid}}/task/{{count($tasks_list) + 10}}">Больше заданий</a>
            </div>
          </div>
          @endif
          <ul class="tasks_list">
            @foreach ($tasks_list as $task)
            <li>
              <div class="task_box">
                <div class="task_name d-flex">
                  <div class="name_and_new d-flex">
                    @if(is_null($task['task']['task_cont']['name']))
                      <h5>{{'Задание'}}</h5>
                    @else
                      <h5>
                        {{mb_substr($task['task']['task_cont']['name'], 0, 27)}}
                        @if(strlen($task['task']['task_cont']['name']) > 27)
                        {{'...'}}
                        @endif
                      </h5>
                    @endif

                    <h5><span>(№</span><span>{{$task['task']['task_cont']['id']}}</span><span>)</span></h5>

                    @if(!$task['task']['task_cont']['check'])
                    <div class="new_task">
                      new
                    </div>
                    @endif
                  </div>
                  @if($is_tutor)
                  <div class="edit_icon edit_icon_task" id="edit_icon_task">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </div>
                  @endif
                </div>

                <div class="task_time_limit">
                  <span>Выполнить к </span> <span>{{$task['task']['task_cont']['time_limit']}}</span>
                </div>

                @if(strlen($task['task']['task_cont']['content']) <= 250)
                <div class="task_text">
                  <span>{{$task['task']['task_cont']['content']}}</span>
                </div>
                @else
                <div class="task_text">
                  <span>{{substr($task['task']['task_cont']['content'], 0, 250)}}</span>
                  <span class="points">{{'...'}}</span>
                  <span class="last_cont">{{substr($task['task']['task_cont']['content'], 251)}}</span>

                </div>
                @endif


                 <div class="task_files_box">
                   @if(isset($task['task']['task_files'][0]->path))
                   <ul class="files_list d-flex">
                     @foreach ($task['task']['task_files'] as $file)
                     <li>
                       @if($file->name == 'Image')
                       <div class="image_box">
                       <a href="{{$file->path}}"><img src="{{$file->path}}" alt="" class="image_task"></a>
                       </div>
                       @else
                       <div class="file_box">
                         <div class="file_content">
                           <a href="{{$file->path}}">
                           {{$file->name}}
                           </a>
                         </div>
                       </div>
                       @endif
                     </li>
                     @endforeach
                   </ul>
                   @endif
                 </div>

                <div class="open_icon_box d-flex open_icon_down_js">
                  <div class="open_icon">
                    <div class="open_icon_down">
                      <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>

                <div class="open_icon_box d-flex open_icon_up_js">
                  <div class="open_icon">
                    <div class="open_icon_up">
                      <i class="fa fa-angle-double-up" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            @if($task['task']['task_cont']['check'])
            <li>
              <div class="task_box">
                <div class="task_name d-flex">
                  <div class="name_and_new d-flex">
                    <h5>Ответ к заданию</h5>
                    <h5><span>(№</span><span>{{$task['answer']['answer_cont']['relationship']}}</span><span>)</span></h5>
                  </div>
                  @if($is_tutor)
                  @if(!$task['answer']['answer_cont']['check'])
                  <div class="check_btn">
                    <div class="btn btn-primary">
                      Оценить
                    </div>
                  </div>
                  @endif
                  @else
                  <div class="edit_icon edit_icon_answer" id="edit_icon_answer">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </div>
                  @endif
                </div>

                <div class="task_time_limit">
                  <span>Отправлен </span><span>{{$task['answer']['answer_cont']['updated_at']->format("Y-m-d H:i")}}</span>
                </div>

                @if(strlen($task['answer']['answer_cont']['content']) <= 250)
                <div class="task_text">
                  <span>{{$task['answer']['answer_cont']['content']}}</span>
                </div>
                @else
                <div class="task_text">
                  <span>{{substr($task['answer']['answer_cont']['content'], 0, 250)}}</span>
                  <span class="points">...</span>
                  <span class="last_cont">{{substr($task['answer']['answer_cont']['content'], 251)}}</span>
                </div>
                @endif

                <div class="task_files_box">
                  @if(isset($task['answer']['answer_files']->path))
                     <ul class="files_list d-flex">
                       @foreach ($task['answer']['answer_files'] as $file)
                       <li>
                         @if($file->name == 'Image')
                         <div class="image_box">
                         <a href="{{$file->path}}"><img src="{{$file->path}}" alt="" class="image_task"></a>
                         </div>
                         @else
                         <div class="file_box">
                           <div class="file_content">
                             <a href="{{$file->path}}">
                             {{$file->name}}
                             </a>
                           </div>
                         </div>
                         @endif
                       </li>
                       @endforeach
                     </ul>
                   @endif
                 </div>

                 <div class="open_icon_box d-flex open_icon_down_js">
                   <div class="open_icon">
                     <div class="open_icon_down">
                       <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                     </div>
                   </div>
                 </div>

                 <div class="open_icon_box d-flex open_icon_up_js">
                   <div class="open_icon">
                     <div class="open_icon_up">
                       <i class="fa fa-angle-double-up" aria-hidden="true"></i>
                     </div>
                   </div>
                 </div>
              </div>
            </li>
            @endif
            @endforeach
          </ul>
        </div>

        <hr/>

        <form class="task_form" id="task_form" action="{{ route('task_answer.upload',  ['studid' => $studid]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset(request()->flag))
            <div class="errors_reg col-lg-6 offset-lg-3" role="alert">
                <strong>{{ 'Не корректный номер задания' }}</strong>
            </div>
            @endif
          <div class="col-lg-6 offset-lg-3 input_file_box">
            <input type="file" name="files[]" value="" multiple id="t_files">
          </div>
          <div class="col-lg-6 offset-lg-3 check_change_box">
            <input type="checkbox" name="check_change" id="check_change">
          </div>
          <div class="check_delet_wrap" id="check_delet_wrap" >
            <div class="col-lg-6 offset-lg-3 d-flex check_delet_box">
              <div class="check_delet_text">
                Удалить старые файлы
              </div>
              <div class="input_check_delet" id="input_check_delet">
                <input type="checkbox" class="check_delet" id="check_delet" name="check_delet">
              </div>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-3 input_name_box input_id_box">
            <input type="text" name="task_id" value="" id="task_id" value="{{ old('task_id') }}">
          </div>
          @if($is_tutor)
          <div class="col-lg-6 offset-lg-3 input_name_box">
            <input type="text" name="name" value="" placeholder="Тема..." id="name" maxlength="130">
          </div>

          <div class="col-lg-6 offset-lg-3 input_time_box">
            <div class="input_time_text">
              Выполнить к:
            </div>
            <div class="input_time">
              <input type="date" class="form-control" id="date" name="date" placeholder="Дата">
            </div>
          </div>
          @else
          <div class="col-lg-6 offset-lg-3 input_name_box">
            <input type="text" name="number" placeholder="Номер задания..." id="number"  maxlength="11">
          </div>
          @endif
          <div class="col-lg-6 offset-lg-3 textarea_box">
            @if($is_tutor)
            <textarea name="content" rows="8" cols="80" placeholder="Комментарий к заданию..." required id="content" maxlength="4000"></textarea>
            @else
            <textarea name="content" rows="8" cols="80" placeholder="Комментарий к ответу..." required id="content" maxlength="4000"></textarea>
            @endif
          </div>

          <div class="col-lg-6 offset-lg-3 justify-content-start registration_btn">
            <div class="btn_box_edit">
              <div class="">
                <button type="submit" class="btn btn-primary">
                  @if($is_tutor)
                  Отправить задание
                  @else
                  Отправить ответ
                  @endif
                </button>
              </div>

            </div>
          </div>
        </form>

        <form class="task_form " action="/append/comment" method="POST" enctype="multipart/form-data" id="comment_form">
            @csrf

            <div class="input_time d-none">
              <input type="text" class="form-control" id="task_id_com" name="task_id_com">
            </div>
            <div class="" id="" >
              <div class="col-lg-6 offset-lg-3 d-flex justify-content-between">
                <div class="">
                  Проверено
                </div>
                <div class="" id="">
                  <input type="checkbox" class="" id="check_check" name="check">
                </div>
              </div>
            </div>

            <div class="col-lg-6 offset-lg-3 input_time_box d-flex">
              <div class="input_time_text">
                Оценка:
              </div>
              <div class="input_time">
                <input type="text" class="form-control" id="grade" name="grade" maxlength="10">
              </div>
            </div>

            <div class="col-lg-6 offset-lg-3 textarea_box">
              <textarea name="comment" rows="8" cols="80" placeholder="Комментарий к оценке..." id="comment" maxlength="1000"></textarea>
            </div>

            <div class="col-lg-6 offset-lg-3 justify-content-start registration_btn">
              <div class="btn_box_edit">
                <div class="">
                  <button type="submit" class="btn btn-primary">
                    Отправить оценку
                  </button>
                </div>

              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
