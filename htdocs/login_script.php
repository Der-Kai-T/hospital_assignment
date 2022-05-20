<?php
	session_start();
	$_SESSION = array();
	
	
	include("include/db_connect.php");
	include("include/pepper.php");
	
	$email 		= $_POST['email'];
	$pw    		= $_POST['password'].PEPPER;
	
	

	
	try{
		
		$pdo = new PDO($pdo_connection['mysql'], $pdo_connection['user'], $pdo_connection['pwd']);
		
		$sql	= "SELECT * FROM user WHERE user_mail = :email";
		
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':email', $email, PDO::PARAM_STR);
		
		$selected = $statement->execute();
		
		while($row = $statement->fetch()){
			$user_id		= $row['user_id'];
			$vorname		= $row['user_firstname'];
			$nachname		= $row['user_lastname'];
			$signature		= $row['user_signature'];
			$password		= $row['user_password'];
			
			
			
			if(password_verify($pw, $password)){
				$_SESSION['bkd_user_id']		= $user_id;
				$_SESSION['bkd_user_first']		= $vorname;
				$_SESSION['bkd_user_last']		= $nachname;
				$_SESSION['user_signature']		= $signature;
			}
			
			
		}
			
		
	}catch (Exception $e){
		$fetch_user_error = $e->getMessage();	
		print_r($fetch_user_error);
	}	
	
	
	if(isset($_SESSION['bkd_user_id'])){
		if($_SESSION['bkd_user_id']==0){
			header("Location:login.php?e");
			exit;	
		}else{
			header("Location:index.php");
			exit;
		}
	}else{
		header("Location:login.php?e");
		exit;
	}
	
	
	
?>