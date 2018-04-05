class Player {
	
    constructor(name) {
		this.player = name;
        this.exp = 0;
	}
	
	getPlayer(){
		return this.player;
	}
}

module.exports = Player;