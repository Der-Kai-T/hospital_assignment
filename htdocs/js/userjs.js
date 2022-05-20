function fetch_regoffices() {
	var input = $("#licence").val();

	var input_ = input.split("-");
	var plate = input_[0];

	var json_string = "js_db/regoffices.php?plate=" + plate;
	var json = $.getJSON(json_string, function (data) {
		console.log(data);
		$("#regoffice").find("option").remove().end;
		var cnt = data.length;
		console.log(
			"Fount " + cnt + " registration offices with matching plates"
		);

		for (var i = 0; i < cnt; i++) {
			var line = data[i];
			var reg_office_id = line["registration_office_id"];
			var reg_office_name = line["registration_office_name"];
			var reg_office_plate = line["registration_plate"];
			var option_string =
				"<option value='" +
				reg_office_id +
				"'>" +
				reg_office_name.trim() +
				" (" +
				reg_office_plate.trim() +
				")</option>\n";

			$("#regoffice").append(option_string);
		}
	});
}

function fetch_market() {
	var input = $("#market").val();
	//console.log(input);
	var json_string = "js_db/market.php?market_id=" + input;
	var json = $.getJSON(json_string, function (data) {
		//console.log(data);
		data = data[0];
		$("#street").val(data["market_street"]);
		$("#zip").val(data["market_zip"]);
		$("#town").val(data["market_town"]);
	});
}

function fetch_street() {
	var input = $("#street").val();

	if (input.length > 2) {
		$("#street_autocomplete").html(
			"<ul id='street_autocomplete_list'></ul>"
		);
		//console.log(input);
		var json_string = "js_db/street.php?street=" + input;
		console.log(json_string);
		var json = $.getJSON(json_string, function (data) {
			//console.log(data);
			data.forEach(function (item) {
				var txt =
					"<a href='#' onclick='autocomplete_street(" +
					item.sgv_id +
					")'>";

				txt += item.sgv_street;
				txt += " (";
				if (item.sgv_street_number != "") {
					txt += "Hausnummer " + item.sgv_street_number + " | ";
				}
				txt +=
					item.sgv_quarter +
					" | " +
					item.sgv_district +
					" | " +
					item.sgv_car_precinct;
				txt += ")</a>";

				$("#street_autocomplete_list").append("<li>" + txt + "</li>");
			});
		});
	}
}

function search_street() {
	var input = $("#street").val();

	if (input.length > 2) {
		$("#street_autocomplete_table_body").html("");
		//console.log(input);
		var json_string = "js_db/street.php?street=" + input;
		console.log(json_string);
		var json = $.getJSON(json_string, function (data) {
			//console.log(data);
			data.forEach(function (item) {
				var line = "<tr> <td>";

				line = line + item.sgv_street;
				line = line + "</td><td>";

				line = line + item.sgv_street_number;
				line = line + "</td><td>";

				line = line + item.sgv_car_precinct;
				line = line + "</td><td>";

				line = line + item.sgv_police_precinct;
				line = line + "</td><td>";

				line = line + item.sgv_zip;
				line = line + "</td><td>";

				line = line + item.sgv_quarter;
				line = line + "</td><td>";

				line = line + item.sgv_district;
				line = line + "</td><td>";

				line =
					line +
					item.sgv_investigator_precinct +
					"<br>" +
					item.sgv_investigator_note;
				line = line + "</td><td>";

				line =
					line +
					"<a href='index.php?page=z_sgv_edit&sgv_id=" +
					item.sgv_id +
					"'><span class='fa fa-edit'></span></a>";
				line = line + "</td><td>";

				line = line + "</td></tr>";

				$("#street_autocomplete_table_body").append(line);
			});
		});
	}
}

function autocomplete_street(streetid) {
	//console.log(streetid);
	var json_string = "js_db/street.php?street_id=" + streetid;
	//console.log(json_string);
	var json = $.getJSON(json_string, function (data) {
		data = data[0];
		console.log(data);
		$("#street").val(data.sgv_street);
		$("#zip").val(data.sgv_zip);
		$("#precinct").val(data.sgv_car_precinct);
		$("#police").val(data.sgv_police_precinct);
		$("#quarter").val(data.sgv_quarter);
		$("#pos_number").focus();
	});
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

function posUnchanged() {
	if ($("#pos_unchanged").prop("checked") == true) {
		$('#position').hide();
		$(".form_pos").prop("required", false);
		$(".form_pos").prop("disabled", true);
		//console.log("true");
	} else {
		$('#position').show();
		$(".form_pos").prop("required", true);
		$(".form_pos").prop("disabled", false);
		//console.log("false");
	}
}

function sogChanged() {
	if ($("#sog").prop("checked") == true) {
		$("#sog_type_box").show();
		$("#krwg_type_box").hide();
	} else {
		$("#sog_type_box").hide();
		$("#krwg_type_box").show();
	}
}

$("input[data-bootstrap-switch]").each(function () {
	$(this).bootstrapSwitch("state", $(this).prop("checked"));
});

function deadline(input_name, deadline_field) {
	let date_field = $("#" + input_name).val();

	let date = new Date(date_field);
	let newDate = new Date(date.setMonth(date.getMonth() + 1));
	let newDateString = newDate.toISOString().split("T")[0];

	$("#" + deadline_field).val(newDateString);
}
