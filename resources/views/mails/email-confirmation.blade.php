<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>Чтобы подтвердить ваш email, перейдите по ссылке:</h3>
    <a href="{{ route('confirm-email', [$user, $token]) }}">Подтвердить email</a>
  </body>
</html>
