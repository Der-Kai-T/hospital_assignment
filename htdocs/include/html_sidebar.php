  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="img/logo.png" alt="Hamburg-Wappen" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $global_application_name; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
	  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
        </div>
        <div class="info">
         
			<?php
				if(isset($_SESSION['bkd_user_id'])){
					$first 		= $_SESSION['bkd_user_first'];
					$last 		= $_SESSION['bkd_user_last'];
					$signature 	= $_SESSION['user_signature'];
					
					echo"<a href='index.php?page=user_data' title='Benutzerkonto bearbeiten' class='d-block'>$first $last<br>$signature</a>
					";
					
				}else{
					echo" <a href='login.php' class='d-block'>Anmelden</a>";
				}
				
				
				
		  ?>
		  
        </div>
      </div>
	  
	
	  
<?php //<span class="right badge badge-danger">New</span> ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
		<li class='nav-header'> </li>
			<li class='nav-header'>ABGEMELDETE FAHRZEUGE</li>
	
				<li class='nav-item'>
					<a href='index.php?page=sv_report' class='nav-link'>
					<i class='nav-icon fa fa-envelope'></i>
					<p>
						Meldungen
					</p>
					</a>
				</li>


				<li class='nav-item'>
					<a href='index.php?page=sv_open' class='nav-link'>
					<i class='nav-icon fa fa-tasks'></i>
					<p>
						offene Aufträge
					</p>
					</a>
				</li>

				<li class='nav-item'>
					<a href='index.php?page=sv_towing_pending' class='nav-link'>
					<i class='nav-icon fa fa-tasks'></i>
					<p>
						offene Abschleppaufträge
					</p>
					</a>
				</li>


				<li class='nav-item'>
					<a href='index.php?page=sv_towing_done' class='nav-link'>
					<i class='nav-icon fa fa-tasks'></i>
					<p>
						abgeschlossene Abschleppaufträge
					</p>
					</a>
				</li>

				<li class='nav-item'>
					<a href='index.php?page=sv_report_achive' class='nav-link'>
					<i class='nav-icon fas fa-archive'></i>
					<p>
						Meldungs-Archiv
					</p>
					</a>
				</li>
			
					<li class='nav-header'>STAMMDATEN</li>
					
					<li class='nav-item'>
						<a href='index.php?page=z_file_number' class='nav-link'>
						  <i class='nav-icon fa fa-list'></i>
						  <p>
							Aktenzeichen
						  </p>
						</a>
					</li>

					<li class='nav-item'>
						<a href='index.php?page=z_sv_action' class='nav-link'>
						  <i class='nav-icon fa fa-list'></i>
						  <p>
							abgem.Fzg. Tätigkeiten
						  </p>
						</a>
					</li>

					<li class='nav-item'>
						<a href='index.php?page=z_sgv' class='nav-link'>
						  <i class='nav-icon fa fa-road'></i>
						  <p>
							SGV
						  </p>
						</a>
					</li>
					
					<li class='nav-item'>
						<a href='index.php?page=user' class='nav-link'>
						  <i class='nav-icon fa fa-user'></i>
						  <p>
							Benutzerverwaltung
						  </p>
						</a>
					</li>
         

					<li class='nav-header'>weitere Anwendungen</li>
			<!-- <li class='nav-item'>
				<a href='mobile' target="_blanck" class='nav-link'>
					<i class='nav-icon fa fa-mobile-alt'></i>
					<p>
					Mobilanwendung
					</p>
				</a>
			</li> -->

			<li class='nav-item'>
				<a href='https://kai-thater.de/bug' target="_blanck" class='nav-link'>
					<i class='nav-icon fa fa-bug'></i>
					<p>
					Bug-Tracker
					</p>
				</a>
			</li>
		
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>