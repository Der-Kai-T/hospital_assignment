<?php
/*
Array
(
    [hospital] => 4
    [area] => 2
)
*/


    $data['hospital_id'] 	= $_POST['hospital'];
    $data['area_id'] 	    = $_POST['area'];

    $query		= "Krankenhaus einem Einsatzabschnitt zuweisen";
    $db_result 	= db_insert("hospital_area", $data);



    include("hospital.php");
?>