<?php session_start(); 
  error_reporting(E_ALL);
  $global_application_name = "<b>Hospital</b>Dispatch";
  $global_application_name_header = "Hospital Dispatch &#124; ";
  $_SESSION['debug']=false;
  
  $security_required_level = 1;
  date_default_timezone_set('Europe/Berlin');
  if(isset($_SESSION['hd_user_id'])){
    echo"<script> const hd_user_id = ".$_SESSION['hd_user_id'].";</script>";
  }else{
    header("Location:login.php");
    die;
  }

  echo"
  <script>
  let server_name = '".$_SERVER['SERVER_NAME']."';
  </script>";

  include("include/db_connect.php");
  include("include/db_querys.php");
  include("include/times.php");
  include("include/mailhandler.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--TODO remove before release -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />

  <title>HospitalDispatch</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

  <link rel="stylesheet" href="plugins/toastr/toastr.css" />
    
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
    
  <!-- Socket.IO -->
  <script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script>
  <script src='js/wss.js'></script>

 <?php//TODO make local?>
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <link rel="icon" href="img/logo.png" type="image/x-icon">
  
  
  <!-- User-CSS -->
  <link href="css/usercss.css" rel="stylesheet">
  
  

   
   
  <script src='js/userjs_preload.js'></script>
  
  
  
</head>
<body class="hold-transition sidebar-mini layout-fixed dark-mode">
<div class="wrapper">

  <?php
  	include("include/html_navbar.php");
	  include("include/html_sidebar.php");
  ?>
  
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php
  
  include("include/html_result.php"); // the default result-handler
	if(isset($_GET['page'])){
		$include_page = $_GET['page'];
	}else{
		$include_page = "___start";
	}
	
	if(is_file($include_page.".php")){
		include($include_page.".php");
	}else{
		include("404.php");
	}
  
  
  
  include("include/html_footer.php");
  ?>
  
  <script src='js/userjs.js'></script>

        
