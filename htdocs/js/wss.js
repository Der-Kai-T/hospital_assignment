var socket;

if (typeof open_websocket !== 'undefined'){
	socket_init();
}


function socket_init() {
	console.log("Connecting to socket.io");

	//socket = io.connect("wss://eventtools.conservices.de:3000");
	socket = io.connect("ws://192.168.178.21:3026");

	socket.on("connect", function () {
		console.log("Socket connected.");
		set_mode("online");
	});

	socket.on("hospital", hospital_received);


}




function hospital_received(data){
	//console.log(data);
	update_hospital(data);
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
