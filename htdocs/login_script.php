<?php
	session_start();
	$_SESSION = array();
	
	
	include("include/db_connect.php");
	include("include/pepper.php");
	
	$email 		= $_POST['email'];
	$pw    		= $_POST['password'].PEPPER;
	
	

	
	try{
		
		$pdo = new PDO($pdo_connection['mysql'], $pdo_connection['user'], $pdo_connection['pwd']);
		
		$sql	= "SELECT * FROM user WHERE user_name = :email";
		
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':email', $email, PDO::PARAM_STR);
		
		$selected = $statement->execute();
		
		while($row = $statement->fetch()){
			$user_id		= $row['user_id'];
			$password		= $row['user_password'];
			$user_admin		= $row['user_admin'];
			$user_name		= $row['user_name'];
			
			
			
			
			if(password_verify($pw, $password)){
				$_SESSION['hd_user_id']			= $user_id;
				$_SESSION['hd_user_admin']		= $user_admin;
				$_SESSION['hd_user_name']		= $user_name;
			}
			
			
		}
			
		
	}catch (Exception $e){
		$fetch_user_error = $e->getMessage();	
		print_r($fetch_user_error);
	}	
	
	
	if(isset($_SESSION['hd_user_id'])){
		if($_SESSION['hd_user_id']==0){
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