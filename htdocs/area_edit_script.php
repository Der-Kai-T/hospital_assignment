<?php



    $data['area_name'] 	            = $_POST['area_name'];
   
    $data['area_modify_ts'] 	    = time();
    $data['area_modify_id']     	= $_SESSION['hd_user_id'];

    $where = array();
    $wh['col'] = "area_id";
    $wh['typ'] = "=";
    $wh['val'] = $_POST['area_id'];
    array_push($where, $wh);
        
    $old = $_POST['area_name_old'];

    $query		= "Einsatzabschnitt $old bearbeiten";
    $db_result 	= db_update("area", $data, $where);



    include("area.php");

?>



