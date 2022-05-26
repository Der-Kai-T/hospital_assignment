<?php


    $link = $_GET['link_id'];
    $hospital = $_GET['hospital_id'];
    $discipline = $_GET['discipline_id'];


    $return = array();

	$pdo = new PDO($pdo_connection['mysql'], $pdo_connection['user'], $pdo_connection['pwd']);
			
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	

	$sql	= "DELETE FROM hospital_discipline WHERE hospital_discipline_id = :id AND hospital_id = :hid AND discipline_id = :did";		
	
	$statement = $pdo->prepare($sql);

	$statement->bindParam(":id", $link);
	$statement->bindParam(":hid", $hospital);
	$statement->bindParam(":did", $discipline);
	

	try{
		$db_result = $statement->execute();
	}catch (Exception $e){
		$return['pdo_error'] = $e;
	}
	
	if(isset($db_result) && $db_result == true){
		$return['result'] = "ok";
		
	}else{
		$return['result'] = "nok";
		$return['error_info'] = $pdo->errorInfo();
		
	}

    $db_result = $return;
    //TODO Add names hier
    $hospital_name = "Krankenhausname";
    $discipline = "Fachrichtung";
    $query = "Zuweisung der Fachrichtung $discipline des Krankenhauses $hospital_name entfernen";

    include("hospital.php");


?>