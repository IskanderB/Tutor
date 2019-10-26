@extends('layout')

@section('content')
<div class="col-lg-9">
  <div id="app">
    <socket-chat-component :users="{{ \App\User::select('email', 'id')->where('id', '!=', Auth::id())->get() }}" :user="{{ Auth::user() }}"></socket-chat-component>
  </div>
</div>
@endsection
