@extends('layout')

@section('content')
<div class="col-lg-9">
  <div class="container col-lg-12 account_box">


  <!-- <?php foreach ($users as $value ): ?>
    <a href="/myaccount/tutorchatroom/{{$value->id}}"> <p>{{$value->email}}</p> </a>
  <?php endforeach; ?> -->

    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="all_users_wrap users_wrap card">
        <div class="card-header">Все пользователи</div>
        <div class="card-body users_box">
          <ul class="users_list">
            @foreach($users as $user)
            <li>
              <div class="li_all_users_box li_box">
                <div class="user d-flex">
                  <div class="user_wrap d-flex">
                    @if($user->is_tutor)
                    <div class="user_icon">
                      T
                    </div>
                    @else
                    <div class="user_icon">
                      S
                    </div>
                    @endif

                    <div class="user_name_wrap">
                      <div class="user_name">
                        {{$user->name}}
                      </div>
                    </div>
                  </div>

                  <div class="app_friend">
                    <div class="app_friend_btn app_friend_btn_plus">
                      <a href="/append/friend/{{$user->id}}" class="">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                      </a>
                    </div>

                  </div>
                </div>

                <div class="user_buttons" id="user_buttons">
                  <div class="user_btn">
                    <a href="/myaccount/tutorchatroom/{{$user->id}}" class="btn btn-primary">Чат</a>
                  </div>

                  @if(!$user->is_tutor and Auth::user()->is_tutor or $user->is_tutor and !Auth::user()->is_tutor)
                  <div class="user_btn">
                    <a href="/user/{{$user->id}}/task/10" class="btn btn-primary">Задания</a>
                  </div>
                  @endif
                </div>
              </div>

            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6">
      <div class="pers_users_wrap users_wrap card">
        <div class="card-header">Друзья</div>
        <div class="card-body users_box">
          <ul class="users_list">
            @foreach($friends as $friend)
            <li>
              <div class="li_all_users_box li_box">
                <div class="user">
                  <div class="user_wrap d-flex">
                    @if($friend->is_tutor)
                    <div class="user_icon">
                      T
                    </div>
                    @else
                    <div class="user_icon">
                      S
                    </div>
                    @endif

                    <div class="user_name_wrap">
                      <div class="user_name">
                        {{$friend->name}}
                      </div>
                    </div>
                  </div>

                  <div class="app_friend">
                    <div class="app_friend_btn">
                      <a href="/delete/friend/{{$friend->id}}" class="">
                        <i class="fa fa-times" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="user_buttons" id="user_buttons">
                  <div class="user_btn">
                    <a href="/myaccount/tutorchatroom/{{$friend->id}}" class="btn btn-primary">Чат</a>
                  </div>
                  @if(!$friend->is_tutor and Auth::user()->is_tutor or $friend->is_tutor and !Auth::user()->is_tutor)
                  <div class="user_btn">
                    <a href="/user/{{$friend->id}}/task/10" class="btn btn-primary">Задания</a>
                  </div>
                  @endif
                </div>
              </div>

            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
