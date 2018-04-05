const http = require('http');
const express = require('express');
const socketio = require('socket.io');

const RpgGame = require('./rpg-game');
const Player = require('./player-game');

const app = express();

const clientPath = `${__dirname}/../client`;
console.log(`Serving static from ${clientPath}`);

app.use(express.static(clientPath));

const server = http.createServer(app);

const io = socketio(server);

let waitingPlayer = null;

io.on('connection', (sock) => {

  if (waitingPlayer) {
	var player = new Player("Billy");
    new RpgGame(player, sock);
    waitingPlayer = null;
  } else {
    waitingPlayer = sock;
    waitingPlayer.emit('message', 'Waiting for an opponent');
  }

  sock.on('message', (text) => {
    io.emit('message', text);
  });
});

server.on('error', (err) => {
  console.error('Server error:', err);
});

server.listen(8080, () => {
  console.log('RPG started on 8080');
});