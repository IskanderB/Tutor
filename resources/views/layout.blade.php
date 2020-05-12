<!DOCTYPE HTML>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>Tutorib</title>
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
                <a href="/">Tutorib</a>
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

        <div class="col-lg-8 ml-auto col-xl-7">
          <nav id="menu_header" class="menu_header">
            <ul class="menu d-flex justify-content-center">
              <li class="menu__item">
                <a href="/">
                  <div>
                    Главная страница
                  </div>
                </a>
              </li>

              <li class="menu__item">
                <a href="/materials">
                  <div>
                    Материалы
                  </div>
                </a>
              </li>

              <li class="menu__item">
                <a href="/reviews">
                  <div>
                    Отзывы
                  </div>
                </a>
              </li>

              <li class="menu__item">
                <a href="/tutoraccount">
                  <div>
                    Мой аккаунт
                  </div>
                </a>
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
              <li><a href="https://ege.sdamgia.ru/">Решу ЕГЭ</a></li>
              <li><a href="https://sdamgia.ru/">Сдам ГИА</a></li>
              <li><a href="https://fipi.ru/">ФИПИ</a></li>
              <li><a href="https://alexlarin.net/">Александр Ларин</a></li>
              <li><a href="https://examer.ru/">EXAMER</a></li>
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
          <div class="logo_footer">
            <div class="logo_footer_wrap">
              <a href="/">
                <div class="d-flex logo_footer_box">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                  <div class="logo_text">
                    Tutorib
                  </div>
                </div>
              </a>
            </div>
          </div>

        </div>

        <div class="col-lg-7 menu_footer col-xl-6">
          <nav>
            <ul class="menu d-flex justify-content-center">
              <li class="menu__item">
                <a href="/">
                  <div>
                    Главная страница
                  </div>
                </a>
              </li>

              <li class="menu__item">
                <a href="/materials">
                  <div>
                    Материалы
                  </div>
                </a>
              </li>

              <li class="menu__item">
                <a href="/reviews">
                  <div>
                    Отзывы
                  </div>
                </a>
              </li>

              <li class="menu__item">
                <a href="/tutoraccount">
                  <div>
                    Мой аккаунт
                  </div>
                </a>
              </li>
            </ul>
          </nav>
        </div>



        <div class="col-lg-3 col-xl-4">
          <div class="icons_footer">
            <ul class="d-flex justify-content-center icons_footer_ul">
              <li> <a href="https://vk.com/sanek714"><i class="fa fa-vk" aria-hidden="true"></i></a> </li>
              <li> <a href="https://github.com/IskanderB"><i class="fa fa-github" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="col-lg-12 powered_wrap">
    <div class="powered_box">
      <div class="powered">
        Powered by VPS
      </div>
      <div class="name">
        Александр Хуртин
      </div>
      <div class="contacts">
        axurtin.rep@gmail.com
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
  <script type="text/javascript">
  window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
  ]); ?>
  </script>
</body>

</html>
