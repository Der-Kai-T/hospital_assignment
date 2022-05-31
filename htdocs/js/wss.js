var socket;

function socket_init() {
	console.log("Connecting to socket.io");

	//socket = io.connect("wss://eventtools.conservices.de:3000");
	socket = io.connect("ws://localhost:3026");

	socket.on("connect", function () {
		console.log("Socket connected.");
		set_mode("online");
	});

}

function update_hospital(id, space, text){
	$('#hospital_space_'+id).html(space.toString());
	$('#hospital_txt_' + id).html(text.toString());
}


function set_mode(mode){
	if(mode == "online"){
		$('#is_online').show();
		$('#is_offline').hide();
	}else{
		$('#is_online').hide();
		$('#is_offline').show();
	}
}
