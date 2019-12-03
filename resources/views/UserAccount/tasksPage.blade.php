@extends('layout')

@section('content')
  <div class="col-lg-9">
    <div class="card">
      <div class="card-header">Редактировать данные пользователя</div>

      <div class="card-body">
        <div class="col-lg-10 tasks_box">

        </div>

        <form class="task_form" action="{{ route('task_answer.upload',  ['studid' => 2]) }}" method="POST">
            @csrf

          <div class="col-lg-6 offset-lg-3 input_file_box">
            <input type="file" name="files" value="" multiple>
          </div>

          <div class="col-lg-6 offset-lg-3 input_time_box">
            <input type="date" class="form-control" id="date" name="date" placeholder="Дата" required>
          </div>

          <div class="col-lg-6 offset-lg-3 textarea_box">
            <textarea name="content" rows="8" cols="80" placeholder="Комментарий к заданию..."></textarea>
          </div>

          <div class="col-lg-6 offset-lg-3 justify-content-start registration_btn">
            <div class="btn_box_edit">
              <div class="">
                <button type="submit" class="btn btn-primary">
                Сохранить изменения
                </button>
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
