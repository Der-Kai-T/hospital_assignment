<?php
	header('Content-Type: application/json');
		
	$return_array = array();

	include("../include/db_connect.php");


	if(isset($_GET['street'])){
		$street = $_GET['street'];
		if($street == ""){
			die;
		}
		
	
		$street = "%".$street."%";
		$sql	= "SELECT * FROM z_sgv WHERE sgv_street LIKE :street";
		
		$pdo = new PDO($pdo_connection['mysql'], $pdo_connection['user'], $pdo_connection['pwd']);
							
		$statement	= $pdo->prepare($sql);
		
		$statement->bindParam(':street', $street);
		
		$statement->execute();
			
		while($row = $statement->fetch()){
			array_push($return_array, $row);
		}
	
	
		
	}else if(isset($_GET['street_id'])){
		$street_id = $_GET['street_id'];

		
		$sql	= "SELECT * FROM z_sgv WHERE sgv_id = :streetid";
		
		$pdo = new PDO($pdo_connection['mysql'], $pdo_connection['user'], $pdo_connection['pwd']);
							
		$statement	= $pdo->prepare($sql);
		
		$statement->bindParam(':streetid', $street_id);
		
		$statement->execute();
			
		while($row = $statement->fetch()){
			array_push($return_array, $row);
		}

	}else{
		die;
	}

	$json = json_encode($return_array, JSON_UNESCAPED_UNICODE);
	
		echo $json;

	
?>