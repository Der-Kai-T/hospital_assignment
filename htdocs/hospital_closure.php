
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?>  Sperrungen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item active">Sperrungen</li>
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
				<h3 class="card-title">Krankenhaussperrungen</h3>

				<div class="card-tools">
					<a href="index.php?page=hospital_closure_add" title="neue Sperrung anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
					<?php
                        if(!isset($_GET['archive'])){
                            echo '<a href="index.php?page=hospital_closure&archive" title="auch vergangene Anzeigen" class="btn btn-primary"><i class="fas fa-archive"></i> Archiv</a>';
                        }

                        ?>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Krankenhaus</th>
								<th>Zeitraum</th>
								
								<th>geändert</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php

                            $db_array   = array();
							$now        = time();
                            $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

                            if(isset($_GET['archive'])){
                                $sql		= "SELECT * FROM hospital h, hospital_closure c, discipline d WHERE h.hospital_id = c.hospital_id AND c.discipline_id = d.discipline_id  ORDER BY c.hospital_closure_start_ts ASC";
                            }else{
                                $sql		= "SELECT * FROM hospital h, hospital_closure c, discipline d WHERE h.hospital_id = c.hospital_id AND c.discipline_id = d.discipline_id AND c.hospital_closure_end_ts > $now ORDER BY c.hospital_closure_start_ts ASC";
                            }
                           
                            
                           // echo $sql;
                            $statement	= $pdo->prepare($sql);
                            // $statement->bindParam(':hid', $hospital_id);
                            // $statement->bindParam(':end', $now);
                            // $statement->bindParam(':start', $now_);
                            $statement->execute();
                    
                    
                            while($row = $statement->fetch()){
                                foreach ($row as $key => $value){
                                    $row[$key] = db_parse($value);
                                }
                                array_push($db_array, $row);
                            }
						
							
                            
						
							foreach($db_array as $line){
								
								$hospital_name		 		= $line['hospital_name'];
								$discipline_name 			= $line['discipline_name'];
								$hospital_closure_id 	    = $line['hospital_closure_id'];
								
								$hospital_closure_start_ts 		= UnixToTime($line['hospital_closure_start_ts']);
								$hospital_closure_end_ts 		= UnixToTime($line['hospital_closure_end_ts']);


								$discipline_modify_ts 		= UnixToTime($line['discipline_modify_ts']);
								$discipline_modify_id 		= db_get_user($line['discipline_modify_id'])['user_name'];

								$hospitals = "";

                                //if active
                                if($line['hospital_closure_start_ts'] <= $now && $line['hospital_closure_end_ts'] >= $now){
                                    $bg_color = "bg-teal";
                                }else if($line['hospital_closure_end_ts'] <= $now){
                                    $bg_color = "bg-navy";
                                }else{
                                    $bg_color = "";
                                }

								
								echo "
									<tr class='$bg_color'>
										<th>$hospital_name<br>$discipline_name</th>
										<td>$hospital_closure_start_ts <br>$hospital_closure_end_ts</td>
							
										<td>$discipline_modify_ts<br>$discipline_modify_id</td>
										<td><a href='index.php?page=hospital_closure_edit&hospital_closure_id=$hospital_closure_id'><span class='fa fa-edit'></span></a></td>
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