<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
        <a class="nav-link" href="https://kai-thater.de/bug" target="_blanck"><i class="fas fa-bug"></i> Bug-Tracker</a>
      </li>
      <?php
      if(isset($_SESSION['hide_on_mobile'])){
        $mobile_active = "bg-success";
      }else{
        $mobile_active = "";
      }

      ?>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link <?php echo $mobile_active;?>" href="index.php?page=__hide_on_mobile" id="mobile_link"><i class="fas fa-mobile"></i> Mobilansicht</a>
      </li>
	  

	     <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="index.php?page=___about"><i class="fas fa-info-circle"></i> Infos</a>
      </li>
	  
    </ul>




    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="index.php?page=search"> <i class="fas fa-search"></i> Suche</a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="logout.php"> Abmelden <i class="fas fa-sign-out-alt"></i></a>
      </li>
	  
      
    </ul>
	
  </nav>
  <!-- /.navbar -->

