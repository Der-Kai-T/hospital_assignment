<?php

/*Array
(
    [hospital] => 16
    [discipline] => 1
    [transport_number] => 123
    [transport_weight] => 10
    [transport_duration] => 45
)
*/

    $data['transport_number'] 	        = $_POST['transport_number'];
    $data['hospital_id'] 	            = $_POST['hospital'];
    $data['discipline_id'] 	            = $_POST['discipline'];
    $data['transport_weight'] 	        = $_POST['transport_weight'];
    $data['transport_duration'] 	    = $_POST['transport_duration']*60;
    $data['transport_timestamp'] 	    = time();
    
    $data['transport_modify_ts'] 	    = time();
    $data['transport_modify_id'] 	    = $_SESSION['hd_user_id'];


    $query		= "Transport anlegen";
    $db_result 	= db_insert("transport", $data);

    if($db_result['result'] == "ok"){
        //emit socket

        $hospital = get_hospital($_POST['hospital']);

        $hospital_json = json_encode($hospital[0], JSON_UNESCAPED_UNICODE);

        echo "<script>
            let data = $hospital_json;
            
            socket.emit('hospital', data);
            </script>";

    }

    include("transport.php");

?>