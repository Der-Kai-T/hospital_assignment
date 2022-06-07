var socket;




function socket_init() {
	console.log("Connecting to socket.io");

	if(server_name == "localhost"){
		socket = io.connect("ws://192.168.178.21:3026");
	}else{
		socket = io.connect("wss://hospital-dispatch.akkon-hh.de:3026");
	}

	

	socket.on("connect", function () {
		console.log("Socket connected.");
		set_mode("online");
	});

	socket.on("hospital", hospital_received);


}




function hospital_received(data){
	console.log("hospital received");
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
