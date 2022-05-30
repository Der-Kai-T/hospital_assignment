console.log("server.js is loading");

var fs = require("fs");
var http = require("http");
var https = require("https");

/* TODO Add Certificates
var privatekey = fs.readFileSync("static/cert/key.pem", "utf8");
var certificat = fs.readFileSync("static/cert/cert.pem", "utf8");
var credentials = { key: privatekey, cert: certificat };
*/

var express = require("express");
var app = express();

/* TODO Add MySQL-Support
const {mysql_user, mysql_password} = require("./credentials.json");

var mysql = require("mysql");
var con = mysql.createConnection({
    host: "eventtools.conservices.de",
	user: mysql_user,
	password: mysql_password,
	database: "eventtools",
});

con.connect(function (err){
    if(err)throw err;
    console.log("Connected to database");
});

con.on("error", function (err) {
	log("MySql-Error");
	console.log(err);
});


*/


var httpServer = http.createServer(app); //for debuggin locally
// var httpServer = https.createServer(credentials, app); // for deployment on hetzner-server

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
}





function log(msg) {
	var ts = new Date();
	var date = ts.toLocaleString("de-DE");

	console.log(date + ": " + msg);
}