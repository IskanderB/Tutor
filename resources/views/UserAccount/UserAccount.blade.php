@extends('layout')

@section('content')
<div class="col-lg-9">
  <div>
    <socket-chat-component :user="{{ $user }}"></socket-chat-component>
  </div>
</div>
@endsection
