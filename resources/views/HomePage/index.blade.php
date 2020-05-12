@extends('layout')

@section('content')
<div class="col-lg-3">
  <div class="img_author mx-auto">
  </div>
  <div class="icons">

    <ul class="d-flex icons_ul">
      <li>
        <div class="icon_box">
          <a href="https://vk.com/sanek714"><i class="fa fa-vk" aria-hidden="true"></i></a>
        </div>
      </li>
      <li>
        <div class="icon_box">
          <a href="https://github.com/IskanderB"><i class="fa fa-github" aria-hidden="true"></i></a>
        </div>
      </li>
    </ul>

  </div>
</div>

<div class="col-lg-6">


  <div class="text_author">
    <div class="title_author">
      <h2>Добро пожаловать!</h2>
    </div>
    <hr>
    <div class="lable_author">
      <h4><span class="tutorib_line">Tutorib</span> - это сервис, предназначенный для удобного взаимодействия репетиторов и учеников </h4>
    </div>

    <br>

    <div class="content_author">
      <h5>Сейчас я расскажу какие возможности открывает <span class="tutorib_line">Tutorib</span> для репетиторов и их клиентов</h5>
      <hr>
      <div>
        <span class="tutorib_bold">Tutorib</span> предоставляет 2 основных интструмента для удобной учёбы и работы:
      </div>
      <ul class="list_basic_models">
        <li>Чат</li>
        <li>Комната с заданиями</li>
      </ul>
      <hr>
      <div class="">
        Возможности <span class="tutorib_line">чата</span> на <span class="tutorib_bold">Tutorib</span> аналогичны возможностям современных месенджеров, он позволяет обмениваться сообщениями,
        отправлять картинки и файлы любых форматов.
      </div>
      <hr>
      <div class="">
        <span class="tutorib_line">Комната с заданиями</span> - мощный инструмент, позволяющий структурировать и систематезировать процесс получения, выполнения и отправки
        учеником домашнего задания.
      </div>
      <div class="">
        Данный инструмент даёт возможность репетитору отправить домашнее задание для ученика в удобном формате, указать тему, комментарий
        и приложить все необходимые файлы и картинки, а ученику ответить на это задание.
      </div>
      <hr>
      <div class="">
        Все инструменты <span class="tutorib_bold">Tutorib</span> обладают нативным интерфейсом, так что у вас не возникнет сложностей с их использованием.
        Удачной работы!
      </div>
    </div>
  </div>



</div>

@endsection
