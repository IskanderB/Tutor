@extends('layout')

@section('content')

<div class="col-lg-9">
  <div class="card">
    <div class="card-header">Сбросить пароль</div>

    <div class="card-body">

      <form class="registration_form" action="{{ route('password.email') }}" method="POST">
          @csrf

          @if (session('status'))
          <div class="offset-lg-3 col-lg-8">
            <div class="alert alert-success left_move_reg" role="alert">
                <!--{{ session('status') }}-->
                Мы отправили ссылку для сброса пароля на ваш email!
            </div>
          </div>

          @endif

        <div class="password_ch_label offset-lg-3 col-lg-8">
          <div class="left_move_reg">
            <h5>Введите ваш email</h5>
            <div class="text">
              На него будет оправлено письмо со ссылкой для сброса пароля
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="full_name" class="col-lg-3 col-form-label text-md-right">Email</label>
          <div class="col-lg-6">
            <input type="email" id="email" class="form-control" name="email" value="{{ Auth::user()->email ?? ''}}">
          </div>
        </div>

        @error('email')
            <div class="col-lg-9 offset-lg-3 errors_reg">
              <div class="left_move_reg">
                <strong>{{ $message }}</strong>
              </div>
            </div>
        @enderror

        <div class="col-lg-6 offset-lg-3 justify-content-start registration_btn">
          <div class="">
            <button type="submit" class="btn btn-primary left_move_reg">
            Отправить ссылку
            </button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
