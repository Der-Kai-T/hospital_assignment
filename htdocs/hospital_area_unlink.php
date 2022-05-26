<?php


    $link = $_GET['link_id'];
    $area = $_GET['area_id'];
    $hospital = $_GET['hospital_id'];


    $return = array();

	$pdo = new PDO($pdo_connection['mysql'], $pdo_connection['user'], $pdo_connection['pwd']);
			
	$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	

	$sql	= "DELETE FROM hospital_area WHERE hospital_area_id = :id AND hospital_id = :hid AND area_id = :aid";		
	
	$statement = $pdo->prepare($sql);

	$statement->bindParam(":id", $link);
	$statement->bindParam(":hid", $hospital);
	$statement->bindParam(":aid", $area);
	

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
    $area_name = "Bereichname";
    $query = "Zuweisung des Krankenhauses $hospital_name zum Einsatzabschnitt $area_name aufheben";

    include("hospital.php");


?>