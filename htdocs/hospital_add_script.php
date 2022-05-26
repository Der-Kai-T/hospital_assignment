<?php
/*
Array
(
    [hospital_name] => UKE
    [hospital_capacity] => 15
    [hospital_street] => Martinistraße
    [hospital_number] => 52
    [hospital_zip] => 20251
    [hospital_town] => Hamburg
)

*/


    $data['hospital_name'] 	= $_POST['hospital_name'];
    $data['hospital_street'] 	= $_POST['hospital_street'];
    $data['hospital_number'] 	= $_POST['hospital_number'];
    $data['hospital_zip'] 	= $_POST['hospital_zip'];
    $data['hospital_town'] 	= $_POST['hospital_town'];
    $data['hospital_capacity'] 	= $_POST['hospital_capacity'];
    $data['hospital_name_short'] 	= $_POST['hospital_name_short'];
    $data['hospital_modify_ts'] 	= time();
    $data['hospital_modify_id'] 	= $_SESSION['hd_user_id'];


    

    $query		= "Neues Krankenhaus anlegen";
    $db_result 	= db_insert("hospital", $data);



    include("hospital.php");

?>


