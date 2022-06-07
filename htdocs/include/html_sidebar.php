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
				if(isset($_SESSION['hd_user_id'])){
					$name 		= $_SESSION['hd_user_name'];
					$admin 		= $_SESSION['hd_user_admin'];
					if($admin == 1){ $admin_ = "Administrator";}else{$admin_="";}
					
					echo"<span class='text-light'>Angemeldeter Benutzer:</span><br>
					<a href='index.php?page=user_data' title='Benutzerkonto bearbeiten' class='d-block'>$name<br>$admin_</a>
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
			<li class='nav-header'>ZUWEISUNG</li>
	
				<li class='nav-item '>
					<a href='index.php?page=assignment&short' class='nav-link bg-light'>
						<i class="fas fa-hospital-alt"></i>
						<p>
							Alle Krankenhäuser
						</p>
						</a>
				</li>

				<?php

					$where = array();
					$wh['col'] = "area_active";
					$wh['typ'] = "=";
					$wh['val'] = "1";
					array_push($where, $wh);

					$order = array();
					$order1['col'] = "area_name";
					$order1['dir'] = "ASC";

					array_push($order, $order1);

					$db_array = db_select("area", $where, $order);


					foreach($db_array as $line){
						$area_id		 	    	= $line['area_id'];
						$area_name       			= $line['area_name'];
						
						echo"
							<li class='nav-item'>
								<a href='index.php?page=assignment&area=$area_id&short' class='nav-link'>
									<i class='fas fa-hospital-alt'></i>
									<p>
										$area_name
									</p>
									</a>
							</li>
						
						
						
						";

					}
				?>


					<li class='nav-item '>
						<a href='index.php?page=hospital_closure' class='nav-link text-danger'>
						<i class="fas fa-lock"></i>
						  <p>
							Sperrungen
						  </p>
						</a>
					</li>

					<li class='nav-item '>
						<a href='index.php?page=transport' class='nav-link'>
						<i class="fas fa-ambulance"></i>
						  <p>
							Alle Transporte
						  </p>
						</a>
					</li>

				<?php//TODO Why is it so croocked??>

			
					<li class='nav-header'>VERWALTUNG</li>
					
					<li class='nav-item'>
						<a href='index.php?page=hospital' class='nav-link'>
						<i class="fas fa-hospital"></i>
						  <p>
							Krankenhäuser
						  </p>
						</a>
					</li>

					<li class='nav-item'>
						<a href='index.php?page=discipline' class='nav-link'>
						  <i class='nav-icon fa fa-list'></i>
						  <p>
							Fachrichtungen
						  </p>
						</a>
					</li>

					<li class='nav-item'>
						<a href='index.php?page=area' class='nav-link'>
						<i class="fas fa-map"></i>
						  <p>
							Abschnitte / Bereiche
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

			
		
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>