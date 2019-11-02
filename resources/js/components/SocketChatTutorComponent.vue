<template>
    <div class="container">
      <div class="col-lg-8 offset-lg-2">
        <div class="chat_name_box row">
          <span class="chat_name align-items-center"">
            <a href="#"><h5>{{stud.full_name}}</h5></a> 
          </span>
        </div>
        <div class="chat_box">
          <div class="messages_box" >
            <ul class="message_list">
              <li v-for="iter in dataMessages" v-bind:key="iter.from_user">
                <div class="message_box d-flex">
                  <div class="message_icon">
                    <a href="#">{{iter.position}}</a>
                  </div>
                  <div class="message_info">
                    <div class="message_name_time d-flex">
                      <div class="message_name bottom_line">
                        <a href="#">{{iter.from_user}}</a>
                      </div>
                      <div class="message_time bottom_line" :data-hint="`${iter.full_time}`">
                        {{iter.time}}
                      </div>
                      <div id="hint"></div>
                    </div>
                    <div class="message_cont">
                      {{iter.content}}
                    </div>
                  </div>
                </div>
              </li>
              <!-- <li v-for="a in dataMessages">{{a}}</li> -->
              <!-- {{ dataMessages.join('\n') }} -->
            </ul>
          </div>
        </div>
        <div class="send_box d-flex">
          <div class="input_box col-lg-11">
            <textarea type="text" class="form-control"  placeholder="Наберите сообщение" v-model="message"></textarea>
          </div>
          <div class="button_box">
            <i class="fa fa-paper-plane" aria-hidden="true" @click="sendMessage"></i>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        data: function() {
          return {
            dataMessages: [],
            message: "",
            is_tutor: 0,
            tutor: false,
            nottutor: false,
            usersSelect: "",
          }
        },

        props: [
          'stud',
          'user',
          'messagesfromdb'
        ],

        created() {
          var socket = io.connect('http://localhost:3000');

          var val;
          for (val of this.messagesfromdb) {
              this.dataMessages.push(val);
          }
          var tutor_message;
          if(this.stud.is_tutor){
            tutor_message = "T";
          }
          else {
            tutor_message = "S";
          }

          //this.dataMessages.push(this.messagesfromdb[0]);
          // socket.on("new-action." + this.user.id + ":App\\Events\\Message", function(data) {
          //   this.dataMessages.push(data.message.user + ':' + data.message.message);
          // }.bind(this));
          socket.on("new-action." + this.user.id + ":App\\Events\\Message", function(data) {
            if(data.message.from == this.stud.id){
              this.dataMessages.push({
                from_user: data.message.user,
                time: data.message.time,
                content: data.message.message,
                position: tutor_message,
                full_time: data.message.full_time
              });

            }


          }.bind(this));

          // $(".messages_box").scrollTop($(".messages_box")[0].scrollHeight);
        },

        methods: {
          sendMessage: function() {
            this.usersSelect = "new-action."+this.stud.id.toString();

            if(this.message == ""){
              return false;
            }

            var tutor_my;
            if(this.user.is_tutor){
              tutor_my = "T";
            }
            else{
              tutor_my = "S";
            }
            var now = new Date();
            var time = now.getHours() + ":" + now.getMinutes();
            var full_time = now.getFullYear() + "-" + now.getMonth() + "-" + now.getDate() + " " + time;
            // console.log( full_time );
            axios({
              method: 'get',
              url: '/send-message',
              params: {
                 channels: this.usersSelect,
                 message: this.message,
                 user: this.user.name,
                 to: this.stud.id,
                 from: this.user.id,
                 time: time,
                 full_time: full_time
               },
            })

            .then((response) => {
              this.dataMessages.push(
              {from_user: this.user.name,
              time: time,
              content: this.message,
              position: tutor_my}
              );
              this.message = "";
            });
          },

          scrollToEnd: function() {
            var container = document.querySelector(".messages_box");
            var scrollHeight = container.scrollHeight;
            container.scrollTop  = scrollHeight;
          },
        },
        updated() {
          this.scrollToEnd();
        }
    }
</script>
