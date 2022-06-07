<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-gray navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" title="Seitenleiste ein-/ausblenden"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="index.php">Startseite</a>
      </li>

      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="mobile/" target="_blanck"> <i class="fas fa-mobile-alt"></i> Web-App</a>
      </li> -->
	  
	    <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="https://github.com/Der-Kai-T/hospital_assignment/issues" target="_blanck"><i class="fab fa-github"></i> GitHub</a>
        
      </li>
      <?php
      /* if(isset($_SESSION['hide_on_mobile'])){
      //   $mobile_active = "bg-success";
      // }else{
      //   $mobile_active = "";
      // }

      
      
      // <li class="nav-item d-none d-sm-inline-block">
      //   <a class="nav-link <?php echo $mobile_active;?>" href="index.php?page=__hide_on_mobile" id="mobile_link"><i class="fas fa-mobile"></i> Mobilansicht</a>
       </li>*/
	  ?>

	     <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="index.php?page=___about"><i class="fas fa-info-circle"></i> Infos</a>
      </li>
	  
    </ul>




    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
   <?php
      // <li class="nav-item d-none d-sm-inline-block">
      //   <a class="nav-link" href="index.php?page=search"> <i class="fas fa-search"></i> Suche</a>
      // </li>
   ?>   
   <?php
    /*
        $('#notification_count').removeClass("badge-success"); $('#notification_count').addClass("badge-danger"); $('#notification_count').html("100"); 
        $('#notification_count').removeClass("badge-warning"); $('#notification_count').addClass("badge-success"); $('#notification_count').html("0"); 

    */
   ?>

      <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
      <span class="badge badge-success navbar-badge" id='notification_count'>1</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item dropdown-header">15 Notifications (example)</span>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
      <i class="fas fa-envelope mr-2"></i> 4 new messages
      <span class="float-right text-muted text-sm">3 mins</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
      <i class="fas fa-users mr-2"></i> 8 friend requests
      <span class="float-right text-muted text-sm">12 hours</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item">
      <i class="fas fa-file mr-2"></i> 3 new reports
      <span class="float-right text-muted text-sm">2 days</span>
      </a>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block" >
         <a class="nav-link" href="#" title="sync" id="sync_icon">   <i class="fas fa-sync"></i> <span id='sec_to_sync'></span></a>
      </li>
      


      <li class="nav-item d-none d-sm-inline-block" >
         <a class="nav-link" href="#" title="offline" id="is_offline">   <i class="fas fa-globe-europe text-danger"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" >
        <a class="nav-link" href="#" title="online" id="is_online" style="display:none;">   <i class="fas fa-globe-europe text-success"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="logout.php">  <i class="fas fa-sign-out-alt"></i></a>
      </li>
	  
      
    </ul>
	
  </nav>
  <!-- /.navbar -->

