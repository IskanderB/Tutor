<div class="user_info">
  <div class="user_name user_center">
    <a href="
    @if(Auth::user()['is_tutor'])
    /tutoraccount
    @else
    /myaccount
    @endif
    "><h5><i class="fa fa-graduation-cap" aria-hidden="true"></i> {{Auth::user()->name}}</h5></a>
  </div>

  <div class="user_data">
    <ul class="list-group user_data_list">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Задания
        <span class="badge badge-primary badge-pill">14</span>
      </li>
    </ul>


  </div>


  <div class="logout user_center" >

      <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          @csrf

          <button type="submit" class="btn btn-primary">Выход</button>
      </form>
  </div>
</div>
