<!DOCTYPE HTML>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>Tutor</title>
   <link rel="shortcut icon" href="{{URL::asset('images/title.png')}}" type="image/x-icon">
   <link rel="stylesheet" href="{{URL::asset('css/magnific-popup.css')}}">
   <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
   rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
  <!-- <link rel="stylesheet" href="{{URL::asset('css/registration.css')}}">
   <link rel="stylesheet" href="{{URL::asset('css/passwordReset.css')}}">
   <link rel="stylesheet" href="{{URL::asset('css/myAccount.css')}}">
   <link rel="stylesheet" href="{{URL::asset('css/chat_box.css')}}">-->
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 logo d-flex">
          <div class="logo_text_icon d-flex">
            <a href="/"> <i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
              <div class="logo_text">
                <a href="/">Tutor</a>
              </div>
          </div>
          <div class="menu_bar" id="menu_bar">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </div>
        </div>

        <!--<div class="col-lg-1">
          <div class="menu_bar">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </div>
        </div>-->

        <div class="col-lg-7 ml-auto">
          <nav id="menu_header">
            <ul class="menu d-flex justify-content-center">
              <li class="menu__item">
                <div>
                  <a href="/">Главная страница</a>
                </div>
              </li>

              <li class="menu__item">
                <div>
                  <a href="/tasks/2">Материалы</a>
                </div>
              </li>

              <li class="menu__item">
                <div>
                  <a href="#">Отзывы</a>
                </div>
              </li>

              <li class="menu__item">
                <div>
                  <a href="
                  @if(Auth::user()['is_tutor'])
                  /tutoraccount
                  @else
                  /myaccount/tutorchatroom/1
                  @endif
                  ">Мой аккаунт</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <section class="content_self">
    <div class="container">
      <div class="row" id="app">

        @yield('content')

        <div class="col-lg-3 sitebar">

          @unless (Auth::check())

          @include('sideBarLayouts.entranceLayout')

          @endunless

          @if (Auth::check() and !($checkAccountPage ?? 0))

          @include('sideBarLayouts.userInfoLayout')

          @endif

          @if (($checkAccountPage ?? 0))

          @include('sideBarLayouts.userFullInfoLayout')

          @endif

          <div class="materials">
            <h5>Подготовка к ЕГЭ и ОГЭ:</h5>

            <!--<ul>
              <li> <a href="#">Решу ЕГЭ</a> </li>
              <li> <a href="#">Решу ЕГЭ</a> </li>
              <li> <a href="#">Решу ЕГЭ</a> </li>
              <li> <a href="#">Решу ЕГЭ</a> </li>
            </ul>-->

            <ol class="list-counter-circle">
              <li><a href="#">Решу ЕГЭ</a></li>
              <li><a href="#">Сдам ГИА</a></li>
              <li><a href="#">ФИПИ</a></li>
              <li><a href="#">Александр Ларин</a></li>
              <li><a href="#">EXAMER</a></li>
            </ol>
          </div>


        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-2">
          <div class="logo_footer d-flex">
            <a href="/"> <i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
            <div class="logo_text">
              <a href="/">Tutor</a>
            </div>
          </div>

        </div>

        <div class="col-lg-6 menu_footer">
          <nav>
            <ul class="menu d-flex justify-content-center">
              <li class="menu__item">
                <div>
                  <a href="/">Главная страница</a>
                </div>
              </li>

              <li class="menu__item">
                <div>
                  <a href="#">Материалы</a>
                </div>
              </li>

              <li class="menu__item">
                <div>
                  <a href="#">Отзывы</a>
                </div>
              </li>

              <li class="menu__item">
                <div>
                  <a href="
                  @if(Auth::user()['is_tutor'])
                  /tutoraccount
                  @else
                  /myaccount/tutorchatroom/1
                  @endif
                  ">Мой аккаунт</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>



        <div class="col-lg-4 ">
          <div class="icons_footer">
            <ul class="d-flex justify-content-center icons_footer_ul">
              <li> <a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a> </li>
              <li> <a href="#"><i class="fa fa-github" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
  <script type="text/javascript">
  window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
  ]); ?>
  </script>
</body>

</html>
