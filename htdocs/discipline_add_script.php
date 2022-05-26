<?php



    $data['discipline_name'] 	= $_POST['discipline_name'];
   
    $data['discipline_modify_ts'] 	= time();
    $data['discipline_modify_id'] 	= $_SESSION['hd_user_id'];


    

    $query		= "Neue Fachrichtung anlegen";
    $db_result 	= db_insert("discipline", $data);



    include("discipline.php");

?>



