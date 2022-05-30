<?php

// Array
// (
//     [hospital_closure_id] => 1
//     [hospital] => 5
//     [discipline] => 1
//     [begin_day] => 2022-05-30
//     [begin_time] => 01:00
//     [end_day] => 2022-05-30
//     [end_time] => 20:16
// )


$data['hospital_id'] 	                = $_POST['hospital'];
$data['hospital_closure_start_ts'] 	    = FormTimeToUnix($_POST['begin_day']. " " .$_POST['begin_time']) ;
$data['hospital_closure_end_ts'] 	    = FormTimeToUnix($_POST['end_day']. " " .$_POST['end_time']) ;

$data['discipline_id'] 	                = $_POST['discipline'];



$data['hospital_closure_modify_ts'] 	= time();
$data['hospital_closure_modify_id'] 	= $_SESSION['hd_user_id'];



$where = array();
$wh['col'] = "hospital_closure_id";
$wh['typ'] = "=";
$wh['val'] = $_POST['hospital_closure_id'];
array_push($where, $wh);


$query		= "Krankenhaussperrung bearbeiten";
$db_result 	= db_update("hospital_closure", $data, $where);



include("hospital_closure.php");




?>