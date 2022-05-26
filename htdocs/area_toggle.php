<?php


    if($_GET['state']== "enabled"){
        $data['area_active'] 	    = 0;
        $query		= "Einsatzabschnitt deaktivieren";
    }else{
        $data['area_active'] 	    = 1;
        $query		= "Einsatzabschnitt aktivieren";
    }
   
   
    $data['area_modify_ts'] 	    = time();
    $data['area_modify_id']     	= $_SESSION['hd_user_id'];

    $where = array();
    $wh['col'] = "area_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['area_id'];
    array_push($where, $wh);

    
    $db_result 	= db_update("area", $data, $where);



    include("area.php");

?>



