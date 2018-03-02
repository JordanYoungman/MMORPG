//Message on Connection
const writeEvent = (text) => {
  // <ul> element
  const parent = document.querySelector('#events');

  // <li> element
  const el = document.createElement('li');
  el.innerHTML = text;

  parent.appendChild(el);
};

const onFormSubmitted = (e) => {
  e.preventDefault();

  const input = document.querySelector('#chat');
  const text = input.value;
  input.value = '';

  sock.emit('message', text);
};

const addButtonListeners = () => {
  ['sword', 'spear', 'shield'].forEach((id) => {
    const button = document.getElementById(id);
    button.addEventListener('click', () => {
      sock.emit('turn', id);
    });
  });
};

//Message sent
writeEvent('Welcome to the MMORPG');

const sock = io();
sock.on('message', writeEvent);

document
	.querySelector('#chat-form')
	.addEventListener('submit', onFormSubmitted);

addButtonListeners();