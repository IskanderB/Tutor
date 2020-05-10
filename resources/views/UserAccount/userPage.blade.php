@extends('layout')

@section('content')
  <div class="col-lg-9">
    <div class="container">
      <div class="user_info_box">
        <div class="user_name">
          <h5>{{$userPageInfo->full_name}}</h5>
        </div>
        <ul class="user_info_list">
          <li> <span>Никнейм: </span> <span>{{$userPageInfo->name}}</span> </li>
          @if($is_friends or request()->user_id == Auth::id())
          <li> <span>Email: </span> <span>{{$userPageInfo->email}}</span> </li>
          <li> <span>Номер телефона: </span> <span>{{$userPageInfo->numder_phone}}</span> </li>
          <li> <span>Адрес: </span> <span>{{$userPageInfo->address}}</span> </li>
          @if(!$user->is_tutor)
          <li> <span>Номер школы: </span> <span>{{$userPageInfo->number_school}}</span> </li>
          <li> <span>Номер класса: </span> <span>{{$userPageInfo->number_class}}</span> </li>
          <li> <span>Предмет(ы): </span> <span>{{$userPageInfo->subject}}</span> </li>
          <li> <span>Оценка(и): </span> <span>{{$userPageInfo->mark}}</span> </li>
          <li> <span>Цель обучения: </span> <span>{{$userPageInfo->goal}}</span> </li>
          @endif
          @else
          <li>Информация недоступна</li>
          @endif
        </ul>
      </div>
    </div>
  </div>
@endsection
