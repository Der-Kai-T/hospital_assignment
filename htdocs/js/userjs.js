
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


$("input[data-bootstrap-switch]").each(function () {
	$(this).bootstrapSwitch("state", $(this).prop("checked"));
});

function set_mode(mode){
	if(mode == "online"){
		$('#is_online').show();
		$('#is_offline').hide();
	}else{
		$('#is_online').hide();
		$('#is_offline').show();
	}
}