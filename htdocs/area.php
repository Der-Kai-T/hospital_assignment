
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?>  Einsatzabschnitte</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item active">Einsatzabschnitte</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




<!-- Main content -->
<section class="content">
<?php include("include/html_result.php"); ?>


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Abschnittsverwaltung</h3>

				<div class="card-tools">
					<a href="index.php?page=area_add" title="neuen Einsatzabschnitt anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Abschnitt</th>
								<th>Krankenhäuser</th>
								
								<th>geändert</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							

						
							$order = array();
							$order1['col'] = "area_name";
							$order1['dir'] = "ASC";
							
							array_push($order, $order1);
							
							$db_array = db_select("area", array(), $order);

						
							foreach($db_array as $line){
								
								$area_id		 	    	= $line['area_id'];
								$area_name       			= $line['area_name'];
								$area_active				= $line['area_active'];
								
								$area_modify_ts 	    	= UnixToTime($line['area_modify_ts']);
								$area_modify_id 	    	= db_get_user($line['area_modify_id'])['user_name'];

								$hospitals = "";

								//Meldungen offen, gesamt

									$sql		= "SELECT * FROM area a, hospital_area l, hospital h WHERE a.area_id = l.area_id AND h.hospital_id = l.hospital_id AND a.area_id = :id";
														
									$pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
									
									$statement	= $pdo->prepare($sql);
									
									$statement->bindParam(':id', $area_id);
									
									$statement->execute();
									
									
									while($row = $statement->fetch()){
										foreach ($row as $key => $value){
											$row[$key] = db_parse($value);
										}

										$hospital_name = $row['hospital_name'];
										$link_id = $row['hospital_area_id'];
										$hospital_id = $row['hospital_id'];
										$area_id = $row['area_id'];
										$hospitals .= "$hospital_name <a href='index.php?page=hospital_area_unlink&link_id=$link_id&hospital_id=$hospital_id&area_id=$area_id'><i class='fas fa-unlink'></i></a><br>";

									
									}

									
								$hospitals.= "<br><a href='index.php?page=hospital_area_add'><i class='fas fa-plus'></i> hinzufügen";

								if($area_active == 1){
									$toggle_state = "<a href='index.php?page=area_toggle&area_id=$area_id&state=enabled'><i class='fas fa-eye-slash'></i></a>";
								}else{
									$toggle_state = "<a href='index.php?page=area_toggle&area_id=$area_id&state=disabled'><i class='fas fa-eye'></i></a>";;
								}
								
								echo "
									<tr>
										<th>$area_name</th>
										<td>$hospitals</td>
							
										<td>$area_modify_ts<br>$area_modify_id</td>
										<td><a href='index.php?page=area_edit&area_id=$area_id'><span class='fa fa-edit'></span></a> &nbsp;&nbsp; $toggle_state</td>
									</tr>
								
								";


							}
								
								
							
							?>
						
						</tbody>
				
				
				</table>
	  
	  
			</div>
		</div>
	</div>
</div>