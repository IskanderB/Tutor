<div class="form_entrance">
  <form class="form_entrance" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}">
    </div>

    @error('email')
        <div class="errors_reg">
            <strong>{{ $message }}</strong>
        </div>
    @enderror

    <div class="form-group">
      <label for="exampleInputPassword1">Пароль</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="exampleInputPassword1" placeholder="Password">
    </div>

    @error('password')
        <div class="errors_reg" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
      <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
    </div>
    <button type="submit" class="btn btn-primary">Вход</button>
    <a href="/registration" class="btn btn-primary btn_registration">Регистрация</a>
  </form>
  <div class="a_password_foget">
    <a href="{{ route('fogotpassword') }}" class="">Забыли пароль?</a>
  </div>
</div>
