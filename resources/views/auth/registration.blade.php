@extends('layout')

@section('content')

<div class="col-lg-9">
  <div class="card">
    <div class="card-header">Регистрация</div>

    <div class="card-body">
      <form class="registration_form" action="{{ route('register') }}" method="POST">
          @csrf
        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Логин</label>
          <div class="col-lg-6 col-md-8">
            <input type="text"  required id="full_name" class="form-control" name="name" value="{{ old('name') }}" maxlength="10" minlength="5">
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
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Пароль</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" required id="full_name" class="form-control" name="password" value="{{ old('password') }}" maxlength="32"  minlength="8">
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
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Пароль(ещё раз)</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" required id="full_name" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}"
             maxlength="32"  minlength="8">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Email</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" required id="full_name" class="form-control" name="email" value="{{ old('email') }}">
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
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Номер телефона</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" id="number_phone" class="form-control" name="number_phone" value="{{ old('number_phone') }}"  maxlength="30">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">ФИО</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" required id="full_name" class="form-control" name="full_name" value="{{ old('full_name') }}" maxlength="50">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Адрес</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" id="full_name" class="form-control" name="address" value="{{ old('address') }}"  maxlength="140">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Номер школы</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" id="full_name" class="form-control" name="number_school" value="{{ old('number_school') }}"  maxlength="30">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Класс</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" id="full_name" class="form-control" name="number_class" value="{{ old('number_class') }}"  maxlength="10">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Предмет(ы)</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" id="full_name" class="form-control" name="subject" value="{{ old('subject') }}"  maxlength="40">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Оценка по предмету(ам)</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" id="full_name" class="form-control" name="mark" value="{{ old('mark') }}"  maxlength="50">
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-md-3 col-form-label text-md-right">Цель занятий</label>
          <div class="col-lg-6 col-md-8">
            <input type="text" id="full_name" class="form-control" name="goal" value="{{ old('goal') }}"  maxlength="200">
          </div>
        </div>

        <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-3 justify-content-start registration_btn">
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
