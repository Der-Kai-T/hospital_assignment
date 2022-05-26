<?php
/*
Array with Admin-Rights
(
    [user_name] => 
    [user_admin] => 
    [password] => 
    [password_confirm] => 
)

Array without Admin-Rights
(
    [user_name] => 
    [password] => 
    [password_confirm] => 
)

*/

    $password                       = $_POST['password'];
    $password_repeat                = $_POST['password_confirm'];
   

    $query = "Benutzerpasswort ändern";
    if($password != $password_repeat){
        $db_result['result']        = "nok";
        $db_result['error_string']  = "Passwörter stimmen nicht überein";
       
    }else{
        include("include/pepper.php");
        $where = array();
        $wh['col'] = "user_id";
        $wh['typ'] = "=";
        $wh['val'] = $_POST['user_id'];
        array_push($where, $wh);
        $password_hashed            = password_hash($password.PEPPER, PASSWORD_DEFAULT);
        
        $data['user_password'] 	    = $password_hashed;
        $data['user_modify_ts'] 	= time();
        $data['user_modify_id'] 	= $_SESSION['hd_user_id'];
        $data['user_secret'] = md5(random_bytes(10));
        
        $db_result 	= db_update("user", $data, $where);
    }

    



    include("user.php");

?>


