@extends('layout')

@section('content')
<div class="col-lg-9">

  <socket-chattutor-component :stud="{{ $stud }}" :user="{{ $user }}" :messagesfromdb="{{ $messagesFromDB }}"></socket-chattutor-component>
  <!-- <div class="img_box">
  <img src="{{URL::asset('storage/uploads/APztPn1ZqxF5J2sTgOUU9ojjCWBCWE3GW8xMd7Nx.png')}}" alt="" class="chat_img">
  </div> -->
</div>
@endsection
