<div class="user_info_full">
  <ul class="user_if_list">
    <li>
      <div class="li_box">
        <a href="/tutoraccount">
          <h5><i class="fa fa-graduation-cap" aria-hidden="true"></i> {{Auth::user()->name}}</h5></a>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        @if(Auth::user()->is_tutor)
          <div class="info_key">
            Ответы
          </div>
        @else
          <div class="info_key">
            Задания
          </div>
        @endif
        <div class="info_content">
          <span class="badge badge-primary badge-pill">{{$count_new}}</span>
        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          {{Auth::user()->email}}
        </div>

        <div class="info_content">

        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          {{Auth::user()->number_phone}}
        </div>

        <div class="info_content">

        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
        {{Auth::user()->full_name}}
        </div>

        <div class="info_content">

        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          {{Auth::user()->address}}
        </div>

        <div class="info_content">

        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          Школа №
        </div>

        <div class="info_content">
          {{Auth::user()->number_school}}
        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          Класс №
        </div>

        <div class="info_content">
          {{Auth::user()->number_class}}
        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          Оценка по предмету
        </div>

        <div class="info_content">
          {{Auth::user()->mark}}
        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          {{Auth::user()->subject}}
        </div>

        <div class="info_content">

        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          {{Auth::user()->goal}}
        </div>

        <div class="info_content">

        </div>
      </div>
    </li>
  </ul>

  <div class="user_info_full_btn justify-content-between">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
        @csrf

        <button type="submit" class="btn btn-primary">Выход</button>
        <a href="/myaccount/edit" class="btn btn-primary btn_edit">Редактировать</a>
    </form>

  </div>
</div>
