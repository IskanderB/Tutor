@extends('layout')

@section('content')

<div class="col-lg-9">
  <div class="card">
    <div class="card-header">Регистрация</div>

    <div class="card-body">
      <form class="registration_form" action="{{ route('register') }}" method="POST">
          @csrf
        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Логин</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="name">
          </div>
        </div>

        @error('name')
            <div class="col-lg-9 offset-lg-3 errors_reg">
              <div class="left_move_reg">
                <strong>{{ $message }}</strong>
              </div>
            </div>
        @enderror

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Пароль</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="password">
          </div>
        </div>

          @error('password')
              <div class="col-lg-9 offset-lg-3 errors_reg " >
                <div class="left_move_reg">
                  <strong>{{ $message }}</strong>
                </div>
              </div>
          @enderror

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Пароль(ещё раз)</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="password_confirmation">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Email</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="email">
          </div>
        </div>

        @error('email')
            <div class="col-lg-9 offset-lg-3 errors_reg">
              <div class="left_move_reg">
                <strong>{{ $message }}</strong>
              </div>
            </div>
        @enderror

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Номер телефона</label>
          <div class="col-lg-6">
            <input type="text" id="number_phone" class="form-control" name="number_phone">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">ФИО</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="full_name">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Адрес</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="address">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Номер школы</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="number_school">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Класс</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="number_class">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Предмет(ы)</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="subject">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Оценка по предмету(ам)</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="mark">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Цель занятий</label>
          <div class="col-lg-6">
            <input type="text" id="full_name" class="form-control" name="goal">
          </div>
        </div>

        <div class="col-lg-6 offset-lg-3 justify-content-start registration_btn">
          <div class="">
            <button type="submit" class="btn btn-primary left_move_reg">
            Зарегистрироваться
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
