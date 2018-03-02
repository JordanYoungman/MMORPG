const writeEvent = (text) => {
	//ul element
	const parent = documen.querySelector('#events');
	
	//li element
	const el = document.createElement('li');
	el.innerHTML = text;
	
	parent.appendChild(el);
};


writeEvent('Welcome to the MMORPG');