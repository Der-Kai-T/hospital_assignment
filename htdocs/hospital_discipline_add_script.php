<?php
/*
Array
(
    [hospital] => 4
    [area] => 2
)
*/


    $data['hospital_id'] 	= $_POST['hospital'];
    $data['discipline_id'] 	    = $_POST['discipline'];

    $query		= "Fachrichtung im Krankenhaus anlegen";
    $db_result 	= db_insert("hospital_discipline", $data);



    include("hospital.php");
?>