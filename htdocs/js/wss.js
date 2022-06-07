var socket;

socket_init();


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
	socket.on("transport", transport_received);
	socket.on("closure", closure_received);


}




function hospital_received(data){
	console.log("hospital received");
	update_hospital(data);
}

function transport_received(data){
	let notification_header = "Neuer Transport";
	let notification_message = data.hospital_name;

	fire_notification(notification_message, notification_header, "info");
}

function closure_received(data){
	console.log(data);
	let hospital = data.hospital;
	let closure = data.closure;
	let discipline  = closure.discipline;
	let date = new Date(closure.hospital_closure_end_ts *1000);
	let time = date.toLocaleTimeString();
	let notification_header = hospital.hospital_name + " gesperrt";
	let notification_message = "Fachrichtung: " +  discipline.discipline_name + " bis " + time + " Uhr";

	fire_notification(notification_message,notification_header,"error", 10000);
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
