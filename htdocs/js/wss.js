var socket;

function socket_init() {
	console.log("Connecting to socket.io");

	//socket = io.connect("wss://eventtools.conservices.de:3000");
	socket = io.connect("ws://localhost:3026");

	socket.on("connect", function () {
		console.log("Socket connected.");
	});

}