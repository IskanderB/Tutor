@extends('layout')

@section('content')
  <div class="col-lg-9">
    <div class="card">
      <div class="card-header">Редактировать данные пользователя</div>

      <div class="card-body">
        <form class="registration_form" action="{{ route('edit', ['user' => Auth::user()]) }}" method="POST">
            @csrf

          <div class="form-group row">
            <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Email</label>
            <div class="col-lg-6 col-md-8">
              <input type="text" id="full_name" class="form-control" name="email" value="{{Auth::user()->email}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Номер телефона</label>
            <div class="col-lg-6 col-md-8">
              <input type="text" id="number_phone" class="form-control" name="number_phone" value="{{Auth::user()->number_phone}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">ФИО</label>
            <div class="col-lg-6 col-md-8">
              <input type="text" id="full_name" class="form-control" name="full_name" value="{{ Auth::user()->full_name }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Адрес</label>
            <div class="col-lg-6 col-md-8">
              <input type="text" id="full_name" class="form-control" name="address" value="{{ Auth::user()->address }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Номер школы</label>
            <div class="col-lg-6 col-md-8">
              <input type="text" id="full_name" class="form-control" name="number_school" value="{{ Auth::user()->number_school }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Класс</label>
            <div class="col-lg-6 col-md-8">
              <input type="text" id="full_name" class="form-control" name="number_class" value="{{ Auth::user()->number_class }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Предмет(ы)</label>
            <div class="col-lg-6 col-md-8">
              <input type="text" id="full_name" class="form-control" name="subject" value="{{ Auth::user()->subject }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Оценка по предмету(ам)</label>
            <div class="col-lg-6 col-md-8">
              <input type="text" id="full_name" class="form-control" name="mark" value="{{ Auth::user()->mark }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Цель занятий</label>
            <div class="col-lg-6 col-md-8">
              <input type="text" id="full_name" class="form-control" name="goal" value="{{ Auth::user()->goal }}">
            </div>
          </div>

          <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-3 justify-content-start registration_btn">
            <div class="btn_box_edit">
              <div class="">
                <button type="submit" class="btn btn-primary left_move_reg">
                Сохранить изменения
                </button>
              </div>
              <div class="">
                <a href="{{ route('fogotpassword') }}" class="btn btn-primary btn_edit_password left_move_reg">Сменить пароль</a>
              </div>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
