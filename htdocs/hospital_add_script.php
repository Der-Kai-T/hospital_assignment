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


    $data['hospital_name'] 	= $_POST['name'];
    $data['hospital_street'] 	= $_POST['name'];
    $data['hospital_number'] 	= $_POST['name'];
    $data['hospital_zip'] 	= $_POST['name'];
    $data['hospital_town'] 	= $_POST['name'];
    $data['hospital_capacity'] 	= $_POST['name'];
    $data['hospital_name_short'] 	= $_POST['name'];


    

    $query		= "Neue abgemeldete Fahrzeuge-Tätigkeit anlegen";
    $db_result 	= db_insert("scrap_vehicle_action_type", $data);



    include("z_sv_action.php");

?>



?>