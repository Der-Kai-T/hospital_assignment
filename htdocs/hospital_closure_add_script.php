<?php

/*

Array
(
    [hospital] => 18
    [discipline] => 22
    [begin_day] => 2022-05-30
    [begin_time] => 17:14
    [end_day] => 2022-05-30
    [end_time] => 22:19
)*/


$data['hospital_id'] 	                = $_POST['hospital'];
$data['hospital_closure_start_ts'] 	    = FormTimeToUnix($_POST['begin_day']. " " .$_POST['begin_time']) ;
$data['hospital_closure_end_ts'] 	    = FormTimeToUnix($_POST['end_day']. " " .$_POST['end_time']) ;

$data['discipline_id'] 	                = $_POST['discipline'];



$data['hospital_closure_modify_ts'] 	= time();
$data['hospital_closure_modify_id'] 	= $_SESSION['hd_user_id'];




$query		= "Neue Krankenhaus-Sperrung anlegen";
$db_result 	= db_insert("hospital_closure", $data);

if($db_result['result'] == "ok"){
    //emit socket

    $hospital               = get_hospital($data['hospital_id']);

    $json_data['hospital']  = $hospital[0];
    $data['discipline']     = get_discipline($data['discipline_id'])[0];
    $json_data['closure']   = $data;


    $json_string = json_encode($json_data, JSON_UNESCAPED_UNICODE);
    
    echo "<script>
        let data = $json_string;
        
        socket.emit('closure', data);
        
        </script>";

}

include("hospital_closure.php");


?>