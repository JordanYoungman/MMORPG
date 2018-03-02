const http = require('http');
const express = require('express');

const app = express();

const clientPath = `${__dirname}/../client`;
console.log(`Serving static from ${clientPath}`);

app.use(express.static(clientPath));

const server = http.createServer(app);

io.on('connection', (sock) =>{
	sock.emit('message', 'Hi, welcome to the game!')
})

server.on('error', (err) => {
	console.error('Server error:', err)
});

server.listen(8080, () => {
	console.log('MMORPG Online on 8080')
});