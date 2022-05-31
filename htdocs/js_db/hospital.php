<?php
    session_start();
    include("../include/db_connect.php");
    include("../include/db_querys.php");
    $return_array = array();

    
    header('Content-Type: application/json');

    if(!isset($_SESSION['hd_user_id'])){
        http_response_code(403);
    }

    if(isset($_GET['area'])){
        $area = $_GET['area'];
        $sql		= "SELECT * FROM hospital h, hospital_area l WHERE h.hospital_id = l.hospital_id AND l.area_id = :area ORDER BY hospital_name ASC";
    }else{
        $sql		= "SELECT * FROM hospital ORDER BY hospital_name ASC";
    }

    $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
    
    $statement	= $pdo->prepare($sql);
    if(isset($_GET['area'])){
        $area = $_GET['area'];
        $statement->bindParam(':area', $area);
    }else{

    }
  
    
    $statement->execute();
    
    
    while($row = $statement->fetch()){
        foreach ($row as $key => $value){
            $row[$key] = db_parse($value);
        }

        $row['hospital_occupied'] = get_hospital_allocation($row['hospital_id']);
        if(is_null($row['hospital_occupied'])){
            $row['hospital_occupied'] = "0";
        }

        $row['hospital_closure'] = get_hospital_closure($row['hospital_id']);

        $row['hospital_patients'] = get_hospital_free($row['hospital_id']);

        array_push($return_array, $row);
    }



    $json = json_encode($return_array, JSON_UNESCAPED_UNICODE);
	
	echo $json;

?>