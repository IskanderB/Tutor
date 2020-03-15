<div class="user_info_full">
  <ul class="user_if_list">
    <li>
      <div class="li_box">
        <a href="/tutoraccount">
          <div class="user_name_box">
            <h5><i class="fa fa-graduation-cap" aria-hidden="true"></i> {{Auth::user()->name}}</h5>
          </div>
        </a>
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
          <!-- {{Auth::user()->email}} -->
          {{mb_substr(Auth::user()->email, 0, 21)}}
          @if(strlen(Auth::user()->email) > 21)
          {{'...'}}
          @endif
        </div>

        <div class="info_content">

        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          Номер
        </div>

        <div class="info_content">
          {{mb_substr(Auth::user()->number_phone, 0, 11)}}
          @if(strlen(Auth::user()->number_phone) > 11)
          {{'...'}}
          @endif
        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
        <!-- {{Auth::user()->full_name}} -->
        {{mb_substr(Auth::user()->full_name, 0, 20)}}
        @if(strlen(Auth::user()->full_name) > 20)
        {{'...'}}
        @endif
        </div>

        <div class="info_content">

        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          Адрес
        </div>

        <div class="info_content">
          {{mb_substr(Auth::user()->address, 0, 12)}}
          @if(strlen(Auth::user()->address) > 12)
          {{'...'}}
          @endif
          <!-- {{Auth::user()->address}} -->
        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          Школа
        </div>

        <div class="info_content">
          <!-- {{Auth::user()->number_school}} -->
          {{mb_substr(Auth::user()->number_school, 0, 10)}}
          @if(strlen(Auth::user()->number_school) > 10)
          {{'...'}}
          @endif
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
          Оценка
        </div>

        <div class="info_content">
          <!-- {{Auth::user()->mark}} -->
          {{mb_substr(Auth::user()->mark, 0, 12)}}
          @if(strlen(Auth::user()->mark) > 12)
          {{'...'}}
          @endif
        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          Предметы
        </div>

        <div class="info_content">
          <!-- {{Auth::user()->subject}} -->
          {{mb_substr(Auth::user()->subject, 0, 9)}}
          @if(strlen(Auth::user()->subject) > 9)
          {{'...'}}
          @endif
        </div>
      </div>
    </li>

    <li>
      <div class="li_box d-flex justify-content-between">
        <div class="info_key">
          Цель
        </div>

        <div class="info_content">
          <!-- {{Auth::user()->goal}} -->
          {{mb_substr(Auth::user()->goal, 0, 12)}}
          @if(strlen(Auth::user()->goal) > 12)
          {{'...'}}
          @endif
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
