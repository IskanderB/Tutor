@extends('layout')

@section('content')
  <div class="col-lg-9">
    <div class="card">
      <div class="card-header">Редактировать данные пользователя</div>

      <div class="card-body">
        <div class="col-lg-10 tasks_box offset-lg-1" id='tasks_box'>
          <ul class="tasks_list">
            @foreach ($tasks_list as $task)
            <li>
              <div class="task_box">
                <div class="task_name d-flex">
                  <div class="name_and_new d-flex">
                    <h5>{{$task[0][0]->name}}(№{{$task[0][0]->id}})</h5>
                    @if(!$task[0][0]->check)
                    <div class="new_task">
                      new
                    </div>
                    @endif
                  </div>
                  @if($is_tutor)
                  <div class="edit_icon">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </div>
                  @endif
                </div>

                <div class="task_time_limit">
                  Выполнить к {{$task[0][0]->time_limit}}
                </div>

                <div class="task_text">
                  {{$task[0][0]->content}}
                </div>

                 <div class="task_files_box">
                   <ul class="files_list d-flex">
                     <li>
                       <div class="image_box">
                       <a href=""><img src="@if(isset($task[0][1][0]->path)){{$task[0][1][0]->path}}@endif" alt="" class="image_task"></a>
                       </div>

                       <div class="file_box">
                         <a href="">
                           <div class="file_content">

                           </div>
                         </a>
                       </div>
                     </li>
                   </ul>
                 </div>

                <!-- <div class="open_icon_box d-flex">
                  <div class="open_icon">
                    <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                  </div>
                </div> -->
              </div>
            </li>
            @if($task[0][0]->check)
            <li>
              <div class="task_box">
                <div class="task_name d-flex">
                  <h5>Ответ к заданию(№{{$task[1][0][0]->relationship}})</h5>
                  @if(!$is_tutor)
                  <div class="edit_icon">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </div>
                  @endif
                </div>

                <div class="task_time_limit">
                  Отправлен {{$task[1][0][0]->created_at->format("Y-m-d H:i")}}
                </div>

                <div class="task_text">
                  {{$task[1][0][0]->content}}
                </div>

                <!-- <div class="open_icon_box d-flex">
                  <div class="open_icon">
                    <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                  </div>
                </div> -->
              </div>
            </li>
            @endif
            @endforeach
          </ul>
        </div>

        <form class="task_form" action="{{ route('task_answer.upload',  ['studid' => 2]) }}" method="POST" enctype="multipart/form-data">
            @csrf

          <div class="col-lg-6 offset-lg-3 input_file_box">
            <input type="file" name="files[]" value="" multiple>
          </div>
          @if($is_tutor)
          <div class="col-lg-6 offset-lg-3 input_name_box">
            <input type="text" name="name" value="" placeholder="Тема...">
          </div>

          <div class="col-lg-6 offset-lg-3 input_time_box d-flex">
            <div class="input_time_text">
              Выполнить к:
            </div>
            <div class="input_time">
              <input type="date" class="form-control" id="date" name="date" placeholder="Дата">
            </div>
          </div>
          @else
          <div class="col-lg-6 offset-lg-3 input_name_box">
            <input type="text" name="number" value="" placeholder="Номер задания...">
          </div>
          @endif
          <div class="col-lg-6 offset-lg-3 textarea_box">
            @if($is_tutor)
            <textarea name="content" rows="8" cols="80" placeholder="Комментарий к заданию..." required></textarea>
            @else
            <textarea name="content" rows="8" cols="80" placeholder="Комментарий к ответу..." required></textarea>
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
      </div>
    </div>
  </div>
@endsection
