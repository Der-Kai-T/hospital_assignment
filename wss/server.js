console.log("server.js is loading");

var fs = require("fs");
var http = require("http");
var https = require("https");
const utf8 = require("utf8");


var express = require("express");
var app = express();


const {mysql_user, mysql_password} = require("./credentials.json");

var mysql = require("mysql");
var con = mysql.createConnection({
    host: "hospital-dispatch.akkon-hh.de",
	user: mysql_user,
	password: mysql_password,
	database: "hospital_assignment",
});

con.connect(function (err){
    if(err)throw err;
    console.log("Connected to database");
});

con.on("error", function (err) {
	log("MySql-Error");
	console.log(err);
});


const {server_location} = require("./server_location.json");

if(server_location == "local"){
	var httpServer = http.createServer(app); //for debuggin locally
}else{
	
	var privatekey = fs.readFileSync("static/cert/key.pem", "utf8");
	var certificat = fs.readFileSync("static/cert/cert.pem", "utf8");
	var credentials = { key: privatekey, cert: certificat };

	var httpServer = https.createServer(credentials, app); // for deployment on hetzner-server
}


// 

//open Socket-IO Websocket-Server
const io = require("socket.io")(httpServer, {
	cors: {
		origin: "*",
		methods: ["GET", "POST"],
	},
});

//open Server on Port 3026
httpServer.listen(3026);
console.log("Server has started");
io.sockets.on("connection", newConnection); //what happens on a new connection


function newConnection(socket){
    log("new connection: " + socket.id);

	socket.on("hospital", hospital_transmit);

	socket.on("transport", transport_received);

	socket.on("closure", closure_received);

	function hospital_transmit(data){
		socket.broadcast.emit("hospital", data);
		log("Hospital received");
		//console.log(data);
	}

	function closure_received(data){
		socket.broadcast.emit("closure", data);
		log("Closure received");
		//console.log(data);
	}

	function transport_received(data){
		log("new Transport received");
		
		//console.log(data);
		try{
			con.query("INSERT INTO transport (transport_number, hospital_id, discipline_id, transport_weight, transport_duration, transport_timestamp, transport_modify_ts, transport_modify_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?);",
			[
				data.transport_number,
				data.hospital_id,
				data.discipline_id,
				data.transport_weight,
				data.transport_duration,
				data.transport_timestamp,
				data.transport_modify_ts,
				data.transport_modfiy_id,
			],
			function (error, results, fields) {
				if (error) throw error;
				
				log(
					"Transport stored with ID=" + results.insertId
				);
				
				let hospital = {}; //hospital_object to emit, receiving function requires full database object of hospital

				try{
					//core-data
					con.query("SELECT * FROM hospital WHERE hospital_id = ?;",
					data.hospital_id,
					function(error, results, fields){
						if(error) throw error;
					
						hospital = results[0];

						try{
							//occupied
							con.query("SELECT sum(transport_weight) as weigh FROM transport WHERE hospital_id = ? AND (transport_timestamp + transport_duration) > ?;",
							[data.hospital_id,
								Math.floor(Date.now() / 1000),
							],
							function(error, results, fields){
								if(error) throw error;
							
								hospital.hospital_occupied = results[0].weigh;

								try{
									//closures
									con.query("SELECT * FROM hospital_closure h, discipline d WHERE h.discipline_id = d.discipline_id AND h.hospital_id = ? AND h.hospital_closure_end_ts > ? AND h.hospital_closure_start_ts < ? ORDER BY h.hospital_closure_start_ts",
									[data.hospital_id,
										Math.floor(Date.now() / 1000),
										Math.floor(Date.now() / 1000)+1800,
									],
									function(error, results, fields){
										if(error) throw error;
									
										hospital.hospital_closure = results;
				
										try{
											//patients
											con.query("SELECT * FROM transport WHERE hospital_id = ? AND (transport_timestamp + transport_duration) > ? ORDER BY (transport_timestamp + transport_duration) ASC LIMIT 1;",
											[data.hospital_id,
												Math.floor(Date.now() / 1000),
												
											],
											function(error, results, fields){
												if(error) throw error;
											
												hospital.hospital_patients = results;
												
												data.hospital_name =utf8.decode(hospital.hospital_name);
												 
												io.sockets.emit("transport", data);
												io.sockets.emit("hospital", hospital);
											});
										}catch (e) {
											console.error("MySQL-Error: " + e);
										}
										
										
									});
								}catch (e) {
									console.error("MySQL-Error: " + e);
								}
								
								
								
							});
						}catch (e) {
							console.error("MySQL-Error: " + e);
						}


						
					});
				}catch (e) {
					console.error("MySQL-Error: " + e);
				}
				



				
				
			}
			);
		}catch (e) {
			console.error("MySQL-Error: " + e);
		}
	} 

}





function log(msg) {
	var ts = new Date();
	var date = ts.toLocaleString("de-DE");

	console.log(date + ": " + msg);
}