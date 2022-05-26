<?php



    $data['area_name'] 	            = $_POST['area_name'];
   
    $data['area_modify_ts'] 	    = time();
    $data['area_modify_id']     	= $_SESSION['hd_user_id'];


    

    $query		= "Neuen Einsatzabschnitt anlegen";
    $db_result 	= db_insert("area", $data);



    include("area.php");

?>



