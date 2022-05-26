
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?>  Krankenhäuser</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item active">Krankenhäuser</li>
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
				<h3 class="card-title">Krankenhausverwaltung</h3>

				<div class="card-tools">
					<a href="index.php?page=hospital_add" title="neues Krankenhaus anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Name</th>
								<th>Adresse</th>
								<th>Fachbereiche</th>
								<th>Abschnitte</th>
								<th>geändert</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							

						
							$order = array();
							$order1['col'] = "hospital_name";
							$order1['dir'] = "ASC";
							
							array_push($order, $order1);
							
							$db_array = db_select("hospital", array(), $order);

						
							foreach($db_array as $line){
								
								$hospital_id		 		= $line['hospital_id'];
								$hospital_name 				= $line['hospital_name'];
								$hospital_street	 		= $line['hospital_street'];
								$hospital_number 			= $line['hospital_number'];
								$hospital_zip 				= $line['hospital_zip'];
								$hospital_town 				= $line['hospital_town'];
								$hospital_capacity 			= $line['hospital_capacity'];
								$hospital_name_short 		= $line['hospital_name_short'];
								$hospital_modify_ts 		= UnixToTime($line['hospital_modify_ts']);
								$hospital_modify_id 		= db_get_user($line['hospital_modify_id'])['user_name'];

								$disciplines = "";

								$areas = "";
								echo "
									<tr>
										<th>$hospital_name ($hospital_name_short)</th>
										<td>$hospital_street $hospital_number <br> $hospital_zip $hospital_town</td>
										<td>$disciplines</td>
										<td>$areas</td>
										<td>$hospital_modify_ts<br>$hospital_modify_id</td>
										<td><a href='index.php?page=hospital_edit&hospital_id=$hospital_id'><span class='fa fa-edit'></span></a></td>
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