<template>
    <div class="container">
        <hr>
        <div class="row">
          <div class="col-lg-9">
            <div class="row col-lg-9">
              <select class="form-control" name="" multiple="" v-model="usersSelect">
                <option v-for="user in users" :value="'new-action.' + user.id">{{ user.email }}</option>
              </select>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="10" readonly="">{{ dataMessages.join('\n') }}</textarea>
            </div>

            <div class="input-group col-lg-6">
              <input type="text" class="form-control"  placeholder="Наберите сообщение" v-model="message">
              <div class="input-group-append">
                <button @click="sendMessage" type="button"class="btn btn-outline-secondary">Отправить</button>
              </div>
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
            usersSelect: [],
          }
        },

        props: [
          'users',
          'user'
        ],

        created() {
          var socket = io.connect('http://localhost:3000');

          socket.on("new-action." + this.user.id + ":App\\Events\\Message", function(data) {
            this.dataMessages.push(data.message.user + ':' + data.message.message);
          }.bind(this));

          socket.on("new-action.:App\\Events\\Message", function(data) {
            this.dataMessages.push(data.message.user + ':' + data.message.message);
          }.bind(this));

        },

        methods: {
          sendMessage: function() {

            if(!this.usersSelect.length){
              this.usersSelect.push('new-action.');
            }

            axios({
              method: 'get',
              url: '/send-message',
              params: { channels: this.usersSelect, message: this.message, user: this.user.email },
            })

            .then((response) => {
              this.dataMessages.push(this.user.email + ':' + this.message);
              this.message = "";
            });
          }
        }
    }
</script>
