<!DOCTYPE HTML>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Tutor</title>
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
        <a href="#"> <i class="fa fa-graduation-cap" aria-hidden="true"></i></a>
          <div class="logo_text">
            <a href="#">Tuter</a>
          </div>
        </div>

        <div class="col-lg-7 ml-auto">
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
      </div>
    </div>
  </header>

  <section class="content_self">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="img_author">
          </div>

          <div class="icons">
            <center>
            <ul>
              <i class="fa fa-vk" aria-hidden="true"></i>
              <i class="fa fa-github" aria-hidden="true"></i>
            </ul>
          </center>
          </div>
        </div>

        <div class="col-lg-6">


          <div class="text_author">
            <div class="title_author">
              <h2>Добро пожаловать!</h2>
            </div>

            <div class="lable_author">
              <h4>Вы находитесь на сайте репетитора по физике и математике</h4>
            </div>

            <div class="content_author">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
               Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
               Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                 Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                 Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                   Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                   Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
  </form>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container">

    </div>
  </footer>
</body>
</html>
