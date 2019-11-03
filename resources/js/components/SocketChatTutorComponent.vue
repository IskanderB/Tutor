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
          <div class="button_box">
            <i class="fa fa-paperclip" aria-hidden="true"></i>
          </div>
          <div class="input_box col-lg-11">
            <textarea type="text" class="form-control" name="description" placeholder="Наберите сообщение" v-model="message" id="description" autofocus></textarea>
          </div>
          <div class="button_box">
            <i class="fa fa-smile-o" aria-hidden="true" @click="toggleEmo"></i>
          </div>
          <div class="button_box">
            <i class="fa fa-paper-plane" aria-hidden="true" @click="sendMessage"></i>
          </div>
        </div>
        <!-- <div id="smile">&#128513;</div> -->
        <!-- <div class="ml-2 text-right" xs1>
          <button @click="toggleEmo" fab dark small color="pink">
            <i>insert_emotion</i>
          </button>
        </div> -->
        <div class="floating-div">
          <picker v-if="emoStatus" set="apple" @select="onTextarea" title="Pick" class="picker_comp" />
        </div>
      </div>
    </div>
</template>

<script>
  import { Picker } from 'emoji-mart-vue'
    export default {
        data: function() {
          return {
            dataMessages: [],
            message: "",
            is_tutor: 0,
            tutor: false,
            nottutor: false,
            usersSelect: "",
            emoStatus: false,
          }
        },

        props: [
          'stud',
          'user',
          'messagesfromdb'
        ],

        components: {
          Picker
        },

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

          toggleEmo: function() {
            this.emoStatus = !this.emoStatus;
            },

            onTextarea: function(e) {
              console.log(e);
              if(!e){
                return false;
              }

              if(!this.message){
                this.message = e.native;
              }
              else{
                this.message = this.message + e.native;
              }
            },

          },



        updated() {
          this.scrollToEnd();

        }
    }
</script>
