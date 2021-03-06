const http = require('http').Server();
var io = require('socket.io')(http);
var Redis = require('ioredis');

var redis = new Redis();
redis.psubscribe('new-action.*');
redis.on('pmessage', function(pattern, channel, message) {
  console.log('Message recieved: ' + message);
  console.log('Channel: ' + channel);
  message = JSON.parse(message);
  io.emit(channel + ':' + message.event, message.data);
});

http.listen(3000, function() {
  console.log('Listening on Port: 3000');
});

// const server = http.createServer();
//
// server.on('request', (req, res) => {
// 	res.end('End');
// });
//
// server.listen(3000, () => console.log('Сервер работает'));
