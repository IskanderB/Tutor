@extends('layout')

@section('content')
  <div class="col-lg-9 choose_reg_box">
    <div class="">
      <h5>Выберите в каком статусе вы хотите зарегистрироваться:</h5>
    </div>
    <div class="d-flex choose_btns_reg">
      <a href="/registration" class="btn btn-primary btn_choose_reg" id="btn_choose_reg">Ученик</a>
      <a href="/tutorreg" class="btn btn-primary btn_choose_reg">Репетитор</a>
    </div>
  </div>
@endsection
