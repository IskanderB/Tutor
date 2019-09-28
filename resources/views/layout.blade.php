<!DOCTYPE HTML>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Tuter</title>
   <link rel="shortcut icon" href="{{URL::asset('images/title.png')}}" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
   rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 logo d-flex">
          <div class="logo_text_icon d-flex">
            <a href="#"> <i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
              <div class="logo_text">
                <a href="#">Tuter</a>
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
                  <a href="#">Главная страница</a>
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
                  <a href="#">Мой аккаунт</a>
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
      <div class="row">

        @yield('content')

        <div class="col-lg-3">
          <div class="form_entrance">
            <form class="form_entrance">
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary">Вход</button>
              <button type="submit" class="btn btn-primary btn_registration">Регистрация</button>
            </form>
          </div>

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
            <a href="#"> <i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
            <div class="logo_text">
              <a href="#">Tuter</a>
            </div>
          </div>

        </div>

        <div class="col-lg-6 menu_footer">
          <nav>
            <ul class="menu d-flex justify-content-center">
              <li class="menu__item">
                <div>
                  <a href="#">Главная страница</a>
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
                  <a href="#">Мой аккаунт</a>
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
</body>
</html>
