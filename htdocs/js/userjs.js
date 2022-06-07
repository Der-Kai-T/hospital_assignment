


let bg_colors = {}
bg_colors.none = "";
bg_colors.success = "bg-success";
bg_colors.warning = "bg-warning";
bg_colors.danger = "bg-danger";
bg_colors.overflow = "bg-indigo";
let sec_to_sync = 60;
let sec_counting  = sec_to_sync-2;
let interval_countdown;
let interval_reload;

if (typeof open_websocket !== 'undefined'){
	socket_init();
}

function currentDate(input_name, deadline_field = "") {
	var json_string = "js_db/today.php";
	var json = $.getJSON(json_string, function (data) {
		$("#" + input_name).val(data);
		if (deadline_field == "") {
		} else {
			let date = new Date(data);
			let newDate = new Date(date.setMonth(date.getMonth() + 1));
			let newDateString = newDate.toISOString().split("T")[0];

			$("#" + deadline_field).val(newDateString);
		}
	});
}

function currentTime(input_name) {
	var json_string = "js_db/now.php";
	var json = $.getJSON(json_string, function (data) {
		$("#" + input_name).val(data);
	});
}

$(function () {
	$("#datatable1").DataTable({
		paging: true,
		lengthChange: true,
		searching: true,
		ordering: true,
		info: true,
		autoWidth: false,
	});

	$("#datatable_all").DataTable({
		paging: false,
		lengthChange: false,
		searching: true,
		ordering: true,
		info: false,
		autoWidth: false,
	});
});


function reload_hospital(){
	$('#sync_icon').addClass("rotate");
	$('#sec_to_sync').hide();
	clearInterval(interval_countdown);
	clearInterval(interval_reload);
	sec_counting = sec_to_sync-1;

	

	


	var json_string = "js_db/hospital.php";
	var json = $.getJSON(json_string, function (data) {
		//console.log(data);
		data.forEach(function (item) {
			update_hospital(item);
		});

		$('#sync_icon').removeClass("rotate");
		countdown_interval();
		interval_reload = setInterval(reload_hospital, sec_to_sync*1000);
		$('#sec_to_sync').show();

	});

	
}

function fire_notification(message, title = "", type="info", duration = 5000 ){
	
	let options = {
		timeOut: duration,
		preventDuplicates: true,
	}
	  
	toastr[type](message, title, options)

	
}

$("input[data-bootstrap-switch]").each(function () {
	$(this).bootstrapSwitch("state", $(this).prop("checked"));
});


function update_hospital(item){
	//console.log(item);
	let now = Math.floor(Date.now() / 1000);
	
	var hospital_id = item.hospital_id;
	var space = parseInt(item.hospital_capacity) - parseInt(item.hospital_occupied);
	var percent = (parseInt(item.hospital_occupied) / parseInt(item.hospital_capacity) )*100;
	$('#hospital_' + hospital_id).removeClass('bg-success bg-warning bg-danger bg-indigo');
	$('#hospital_txt_' + hospital_id).removeClass('bg-orange');

	var newclass = "";
	if(percent > 100){
		newclass = bg_colors.overflow;
	}else if(percent > 90){
		newclass = bg_colors.danger;
	}else if(percent > 50){
		newclass = bg_colors.warning;
	}else {
		newclass = bg_colors.success;
	}
	
	var newtxt = "&nbsp;";
	if(item.hospital_closure.length >0){
		let closure = item.hospital_closure[0];
		let discipline_name = closure.discipline_name;
		let mins = 0;
		if(closure.hospital_closure_start_ts < now){
			space = "n/a";

			mins = Math.floor((closure.hospital_closure_end_ts - now)/60);

			newtxt = discipline_name + " noch " + mins + " Minuten gesperrt"; //TODO add timespan
			newclass = bg_colors.none;
		}else{
			mins = Math.floor((closure.hospital_closure_start_ts - now)/60);
			newtxt = $discipline_name + " in "+ mins + " " + " Minuten gesperrt";  //TODO add timespan
		
			$('#hospital_txt_' + hospital_id).addClass("bg-orange");
		}
	}else{
		if(item.hospital_occupied > 0){
			let pats = item.hospital_patients;
			pats = pats[0];
			let weight = pats.transport_weight;
			//floor(($next_free['transport_timestamp'] + $next_free['transport_duration'] - $now)/60);
			let time = Math.floor((parseInt(pats.transport_timestamp) + parseInt(pats.transport_duration) - now)/60);

			newtxt = "nächster frei: " + weight + " in " + time +  " Minuten";
		}
	}

	
	$('#hospital_' + hospital_id).addClass(newclass);
	$('#hospital_space_' + hospital_id).html(space);
	$('#hospital_txt_' + hospital_id).html(newtxt);
	
}

function transport_submit(){
	let data = {};
	let now = Math.floor(Date.now() / 1000);

	data.transport_number 		= $('#transport_number').val();
	data.hospital_id 			= $('#hospital').val();
	data.discipline_id 			= $('#discipline').val();
	data.transport_weight		= $('#transport_weight').val();
	data.transport_duration 	= $('#transport_duration').val()*60;
	data.transport_timestamp	= now;
	data.transport_modify_ts	= now;
	data.transport_modify_id	= hd_user_id;

	socket.emit("transport", data);
	
}





if (typeof open_websocket !== 'undefined'){

	interval_reload = setInterval(reload_hospital, sec_to_sync*1000);
	countdown_interval();
}

function countdown_interval(){
	interval_countdown = setInterval(function(){
		$('#sec_to_sync').html(sec_counting);
		sec_counting -=1;
}, 1000);
}