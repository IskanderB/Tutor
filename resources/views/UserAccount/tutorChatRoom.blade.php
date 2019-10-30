@extends('layout')

@section('content')
<div class="col-lg-9">

  <socket-chattutor-component :stud="{{ $stud }}" :user="{{ $user }}" :messagesfromdb="{{ $messagesFromDB }}"></socket-chattutor-component>

</div>
@endsection
