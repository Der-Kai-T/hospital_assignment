
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?>  Transporte</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item active">Transporte</li>
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
				<h3 class="card-title">Transportverwaltung</h3>

				<div class="card-tools">
					<a href="index.php?page=transport_add" title="neuen Transport anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Einsatznummer</th>
								<th>Krankenhaus</th>
								<th>Gewichtung</th>
								<th>Zeitpunkt</th>
								<th>geändert</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							
                            $db_array = array();
						
							$sql		= "SELECT * FROM transport t, hospital h, discipline d WHERE t.hospital_id = h.hospital_id AND d.discipline_id = t.discipline_id ORDER BY transport_timestamp DESC;";
															
                            $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
                            
                            $statement	= $pdo->prepare($sql);
                            
                            //$statement->bindParam(':id', $hospital_id);
                            
                            $statement->execute();
                            
                            
                            while($row = $statement->fetch()){
                                foreach ($row as $key => $value){
                                    $row[$key] = db_parse($value);
                                }
                                array_push($db_array, $row);
                            }

                            $now = time();

						
							foreach($db_array as $line){
								
								
								$hospital_name 				= $line['hospital_name'];
								$discipline_name	 		= $line['discipline_name'];
								
                                $transport_number           = $line['transport_number'];
                                $transport_weight           = $line['transport_weight'];
                                $transport_duration         = $line['transport_duration'];
                                $transport_timestamp        = $line['transport_timestamp'];

                                $transport_start            = UnixToClock($transport_timestamp);
                                $transport_end              = UnixToClock($transport_timestamp + $transport_duration);

                                $transport_remaining        = ($transport_timestamp + $transport_duration) - $now;

                                if($transport_remaining > 0){
                                    $transport_remaining_   = floor($transport_remaining/60) . " min";
                                    $bg_class               = "bg-teal";
                                }else{
                                    $transport_remaining_   = "abgeschlossen";
                                    $bg_class               = "";
                                }


								$transport_modify_ts 		= UnixToTime($line['transport_modify_ts']);
								$transport_modify_id 		= db_get_user($line['transport_modify_id'])['user_name'];

								//<a href='index.php?page=hospital_edit&hospital_id=$hospital_id'><span class='fa fa-edit'></span></a>
								echo "
									<tr class='$bg_class'>
										<th>$transport_number</th>
										<td>$hospital_name <br> $discipline_name</td>
										<td>$transport_weight</td>
										<td>$transport_start bis $transport_end <br>$transport_remaining_</td>
										<td>$transport_modify_ts<br>$transport_modify_id</td>
										<td></td>
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