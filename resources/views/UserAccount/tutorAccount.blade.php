@extends('layout')

@section('content')
<div class="col-lg-9">

  <?php foreach ($users as $value ): ?>
    <a href="/myaccount/tutorchatroom/{{$value->id}}"> <p>{{$value->email}}</p> </a>
  <?php endforeach; ?>


<!--  <div class="col-lg-8 offset-lg-2">

    <div class="chat_box">
      <div class="messages_box">
        <ul class="message_list">
          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">T</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Alexandr</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:45
                  </div>
                </div>


                <div class="message_cont">
                  Hi! How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">S</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Maria</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:48
                  </div>
                </div>


                <div class="message_cont">
                  Hello! Great. How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">T</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Alexandr</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:45
                  </div>
                </div>


                <div class="message_cont">
                  Hi! How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">S</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Maria</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:48
                  </div>
                </div>


                <div class="message_cont">
                  Hello! Great. How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">T</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Alexandr</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:45
                  </div>
                </div>


                <div class="message_cont">
                  Hi! How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">S</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Maria</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:48
                  </div>
                </div>


                <div class="message_cont">
                  Hello! Great. How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">T</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Alexandr</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:45
                  </div>
                </div>


                <div class="message_cont">
                  Hi! How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">S</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Maria</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:48
                  </div>
                </div>


                <div class="message_cont">
                  Hello! Great. How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">S</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Maria</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:48
                  </div>
                </div>


                <div class="message_cont">
                  Hello! Great. How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">T</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Alexandr</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:45
                  </div>
                </div>


                <div class="message_cont">
                  Hi! How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">S</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Maria</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:48
                  </div>
                </div>


                <div class="message_cont">
                  Hello! Great. How are you?
                </div>
              </div>
            </div>
          </li>

          <li>
            <div class="message_box d-flex">
              <div class="message_icon">
                <a href="#">T</a>
              </div>

              <div class="message_info">
                <div class="message_name_time d-flex">
                  <div class="message_name bottom_line">
                    <a href="#">Alexandr</a>
                  </div>

                  <div class="message_time bottom_line">
                    22:45
                  </div>
                </div>


                <div class="message_cont">
                  Hi! How are you?
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>


    <div class="send_box d-flex">
      <div class="input_box col-lg-11">
        <textarea type="text" class="form-control"  placeholder="Наберите сообщение" v-model="message"></textarea>
      </div>

      <div class="button_box">
        <i class="fa fa-paper-plane" aria-hidden="true"></i>
      </div>

    </div>
  </div> -->

</div>
@endsection
