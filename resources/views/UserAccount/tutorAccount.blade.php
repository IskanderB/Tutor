@extends('layout')

@section('content')
<div class="col-lg-9">

  <?php foreach ($users as $value ): ?>
    <a href="/myaccount/tutorchatroom/{{$value->id}}"> <p>{{$value->email}}</p> </a>
  <?php endforeach; ?>

</div>
@endsection
