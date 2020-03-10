@extends('layout')

@section('content')

<div class="col-lg-9">
  <div class="card">
    <div class="card-header">Сменить пароль</div>

    <div class="card-body">

      <form class="registration_form" action="{{ route('password.update') }}" method="POST">
          @csrf

        <input type="hidden" name="token" value="{{ $token }}">


        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Email</label>
          <div class="col-lg-6">
            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
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
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Новый пароль</label>
          <div class="col-lg-6">
            <input type="password" id="password" class="form-control" name="password" value="" required autocomplete="new-password"  maxlength="32"  minlength="8">
          </div>
        </div>

        @error('password')
            <div class="col-lg-9 offset-lg-3 errors_reg">
              <div class="left_move_reg">
                <strong>{{ $message }}</strong>
              </div>
            </div>
        @enderror

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Пароль ещё раз</label>
          <div class="col-lg-6">
            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" value="" required autocomplete="new-password"  maxlength="32"  minlength="8">
          </div>
        </div>

        <div class="col-lg-6 offset-lg-3 justify-content-start registration_btn">
          <div class="">
            <button type="submit" class="btn btn-primary left_move_reg">
            Сменить пароль
            </button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
