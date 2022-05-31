<?php
session_start();
header('Content-Type: application/json');


if(isset($_SESSION['hd_user_id'])){
    $return_array['result'] =  "success";
}else{
    $return_array['result'] =  "määh";
}


$json = json_encode($return_array, JSON_UNESCAPED_UNICODE);
	
		echo $json;

?>