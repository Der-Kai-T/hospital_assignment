
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
<?php include("include/html_result.php"); ?>



<!-- Main content -->
<section class="content">



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
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							

						
							$order = array();
							$order1['col'] = "file_number_prefix";
							$order1['dir'] = "ASC";
							
							array_push($order, $order1);
							
							$db_array = db_select("file_number", array(), $order);

						
							foreach($db_array as $line){
								
								$file_number_id		 		= $line['file_number_id'];
								$file_number_prefix 		= $line['file_number_prefix'];
								$file_number_name	 		= $line['file_number_name'];
								$file_number_next_free 		= $line['file_number_next_free'];
								$file_number_modify_ts 		= UnixToTime($line['file_number_modify_ts']);
								$file_number_modify 		= db_get_user($line['file_number_modify_id'])['user_full'];


								$now = time();
								$year = UnixToYear($now);
								$next_file_number = $file_number_prefix.format_filenumber($file_number_next_free)."/".$year;


								echo "
									<tr>
										<th>$file_number_prefix</th>
										<td>$file_number_name</td>
										
										<td>$next_file_number</td>
										<td>$file_number_modify_ts<br>$file_number_modify</td>
										<td><a href='index.php?page=z_file_number_edit&file_number_id=$file_number_id&file_number_prefix=$file_number_prefix'><span class='fa fa-edit'></span></a></td>
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