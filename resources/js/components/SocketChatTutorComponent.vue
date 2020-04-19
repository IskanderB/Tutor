<template>
    <div class="container">
      <div class="col-lg-8 offset-lg-2">
        <div class="chat_name_box row">
          <span class="chat_name align-items-center"">
            <a :href="`${stud.page_path}`"><h5>{{stud.full_name}}</h5></a>
          </span>
        </div>
        <div class="chat_box">
          <div class="messages_box" >
            <ul class="message_list">
              <li>
                <div class="more_mes_box" v-if="dataMessages.length >= 30 && is_more_mes">
                  <div class="more_mes_cont" @click="moreMessages">
                    Больше сообщений
                  </div>
                </div>
                <!-- <div class="more_mes_box" v-else="dataMessages[0] > 1">
                  <div class="more_mes_cont" @click="moreMessages">
                    Больше сообщений
                  </div>
                </div> -->
              </li>
              <li v-for="iter in dataMessages" v-bind:key="iter.from_user">
                <div class="message_box">
                  <div class="message_not_img d-flex">
                  <div class="message_icon">
                    <a :href="`${iter.page_path}`">{{iter.position}}</a>
                  </div>
                  <div class="message_info">
                    <div class="message_name_time d-flex">
                      <div class="message_name bottom_line">
                        <a :href="`${iter.page_path}`">{{iter.from_user}}</a>
                      </div>
                      <div class="message_time d-flex">
                        <div class="message_short_time bottom_line" :data-hint="`${iter.full_time}`">
                          {{iter.time}}
                        </div>
                        <div id="hint" class="message_full_time">{{iter.full_time}}</div>
                      </div>
                    </div>
                    <div class="message_cont">
                      {{iter.content}}
                    </div>
                  </div>
                  </div>
                  <div class="images_box">
                    <ul class="images_list d-flex">
                      <li v-for="img in iter.images_path">
                        <div class="image_box" v-if="img.type === 'jpeg'">
                        <a :href="`${img.path}`"><img :src="`${img.path}`" alt="" class="image_chat"></a>
                        </div>

                        <div class="image_box" v-else-if="img.type === 'png'">
                          <a :href="`${img.path}`"><img :src="`${img.path}`" alt="" class="image_chat"></a>
                        </div>

                        <div class="image_box" v-else-if="img.type === 'gif'">
                          <a :href="`${img.path}`"><img :src="`${img.path}`" alt="" class="image_chat"></a>
                        </div>

                        <div class="file_box" v-else>
                          <a :href="`${img.path}`">
                            <div class="file_content">
                              {{img.name}}
                            </div>
                          </a>
                        </div>

                      </li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="upload_wrap justify-content-center" :style="{display: isDNone}">
          <div class="upload_box">
            <div class="progress">
              <div class="progress-bar" role="progressbar" :style="{width: fileProgress + '%'}">
                {{ fileCurrent }}%
              </div>
            </div>
            <div class="row upload_lists">
              <div class="col-lg-6 upload_list">
                <div class="upload_label_box justify-content-between">
                  <div class="upload_label">
                    Очередь({{ filesOrder.length }})
                  </div>
                </div>
                <!-- <h5 class="text-center">Файлы в очереди({{ filesOrder.length }})</h5> -->
                <ul class="list-group upload_ul">
                  <li class="list-group-item upload_li" v-for="file in filesOrder">
                    {{ file.name }}
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 upload_list">
                <div class="upload_label_box justify-content-between">
                  <div class="upload_label">
                    Загруженные({{ filesFinish.length }})
                  </div>
                </div>
                <!-- <h5 class="text-center">Загруженные файлы({{ filesFinish.length }})</h5> -->
                <ul class="list-group upload_ul">
                  <li class="list-group-item upload_li" v-for="file in filesFinish">
                    {{ file.name }}
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="send_box d-flex">
          <div class="button_box">
            <i class="fa fa-paperclip" aria-hidden="true" id="upload_icon"> </i>
            <input type="file" name="image" value="" id="upload" multiple="" @change="fileInputRemove">
          </div>
          <div class="input_box col-lg-11">
            <textarea type="text" class="form-control" name="description" placeholder="Наберите сообщение" v-model="message" id="description" autofocus
              maxlength="3000"></textarea>
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
  import { Picker } from 'emoji-mart-vue';
  import $ from 'jquery';
  import 'magnific-popup';
    export default {
        data: function() {
          return {
            dataMessages: [],
            message: "",
            is_tutor: 0,
            usersSelect: "",
            emoStatus: false,
            filesOrder: [],
            filesFinish: [],
            fileProgress: 0,
            fileCurrent: "",
            files: [],
            relationship: "",
            res: [],
            res_finish: "",
            isDNone: "none",
            is_more_mes: true,
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
                full_time: data.message.full_time,
                images_path: data.message.result,
              });


            }


          }.bind(this));

          // $(".messages_box").scrollTop($(".messages_box")[0].scrollHeight);
        },

        methods: {
          sendMessage: async function() {
            this.usersSelect = "new-action."+this.stud.id.toString();

            if(this.message == ""){
              if(this.files.length == 0){
                return false;
              }
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

            this.relationship = full_time + "f" + this.user.id.toString() + "t" + this.stud.id.toString();

            let json = "";
            // console.log("Length " + this.files.length.toString());
            if(this.files.length){
              await this.fileInputChange();
              // console.log(this.res);
              json = JSON.parse(JSON.stringify(this.res));
              // console.log(json);
            }

            axios({
              method: 'post',
              url: '/send-message',
              params: {
                 channels: this.usersSelect,
                 message: this.message,
                 user: this.user.name,
                 to: this.stud.id,
                 from: this.user.id,
                 time: time,
                 full_time: full_time,
                 relationship: this.relationship,
                 result: json,
               },
            })

            .then((response) => {
              this.dataMessages.push(
              {from_user: this.user.name,
              time: time,
              content: this.message,
              position: tutor_my,
              images_path: response.data.paths,
            }
              );
              this.message = "";
              this.filesFinish = [];
              this.res = [];
              json = "";
              this.files = [];
              this.isDNone = "none";

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

            async fileInputChange() {
              let files = this.files;
              // this.filesOrder = files.slice();

              for(let item of files){
                await this.uploadFile(item);
              }

              // console.log(this.res);

              // let r = this.res;
              // this.resFull(r);

            },

            async uploadFile(item){
              let form = new FormData();
              form.append('image', item);
              form.append('relationship', this.relationship);
              await axios.post('/image/upload', form, {
                onUploadProgress: (itemUpload) => {
                  this.fileProgress = Math.round((itemUpload.loaded / itemUpload.total) * 100);
                  this.fileCurrent = item.name + ' ' + this.fileProgress;
                }
              })
              .then(response => {
                this.res.push(response.data.res);
                this.fileProgress = 0;
                this.fileCurrent = '';
                this.filesFinish.push(item);
                this.filesOrder.splice(item, 1);
              })
            },

            fileInputRemove(event) {
              // console.log(event.target.files);
              let length = event.target.files.length;
              for (var i = 0; i < length; i++) {
                if (event.target.files[i].size > 10000000) {
                  // $(this).val('');

                  break;
                }
                else{
                  if(event.target.files.length <= 10){
                    this.files = Array.from(event.target.files);
                    this.filesOrder = this.files.slice();
                    this.isDNone = "block";
                  }
                }
              }

            },

            resFull(a) {
              this.res_finish = a;
            },

            popupForUpdate() {
              $('.image_box').magnificPopup({
                delegate: 'a',
                type: 'image'
              });
            },

            moreMessages() {
              axios({
                method: 'get',
                url: '/more-messages',
                params: {
                  border_message_id: this.dataMessages[0].id_message,
                  studid: this.stud.id,
                 },
              })

              .then((response) => {

                if (response.data.length < 30){
                  this.is_more_mes = false;
                }
                for (let iter of response.data) {
                    this.dataMessages.unshift(iter);
                }
              });
            },

          },



        updated() {
          this.scrollToEnd();
          this.popupForUpdate();
        }
    }
</script>
