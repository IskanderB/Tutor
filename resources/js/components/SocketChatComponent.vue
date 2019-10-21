<template>
    <div class="container">
        <hr>
        <div class="row">
          <div class="col-lg-9">
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
          }
        },

        mounted() {
          var socket = io.connect('http://localhost:3000');

          socket.on("new-action:App\\Events\\Message", function(data) {
            this.dataMessages.push(data.result);
          }.bind(this));
        },

        methods: {
          sendMessage: function() {
            axios({
              method: 'get',
              url: '/send-message',
              params: { message: this.message },
            })

            .then((response) => {
              this.message = ""
            });
          }
        }
    }
</script>
