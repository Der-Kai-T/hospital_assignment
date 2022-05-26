<?php



    $data['discipline_name'] 	= $_POST['discipline_name'];
   
    $data['discipline_modify_ts'] 	= time();
    $data['discipline_modify_id'] 	= $_SESSION['hd_user_id'];

    $where = array();
    $wh['col'] = "discipline_id";
    $wh['typ'] = "=";
    $wh['val'] = $_POST['discipline_id'];
    array_push($where, $wh);
        
    $old = $_POST['discipline_name_old'];

    $query		= "Fachrichtung $old bearbeiten";
    $db_result 	= db_edit("discipline", $data, $where);



    include("discipline.php");

?>



