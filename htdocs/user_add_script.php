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
   

    $query = "neuen Benutzer anlegen";
    if($password != $password_repeat){
        $db_result['result']        = "nok";
        $db_result['error_string']  = "Passwörter stimmen nicht überein";
       
    }else{
        include("include/pepper.php");
        $password_hashed            = password_hash($password.PEPPER, PASSWORD_DEFAULT);
        $data['user_name'] 	        = $_POST['user_name'];
        $data['user_password'] 	    = $password_hashed;
        $data['user_modify_ts'] 	= time();
        $data['user_modify_id'] 	= $_SESSION['hd_user_id'];

        if(isset($_POST['user_admin'])){
            $data['user_admin'] = 1;
        }
        $data['user_secret'] = md5(random_bytes(10));
        
        $db_result 	= db_insert("user", $data);
    }

    



    include("user.php");

?>


