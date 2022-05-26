
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?>  Fachrichtungen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item active">Fachrichtungen</li>
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
				<h3 class="card-title">Fachrichtungsverwaltung</h3>

				<div class="card-tools">
					<a href="index.php?page=discipline_add" title="neue Fachrichtung anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Name</th>
								<th>Krankenhäuser</th>
								
								<th>geändert</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							

						
							$order = array();
							$order1['col'] = "discipline_name";
							$order1['dir'] = "ASC";
							
							array_push($order, $order1);
							
							$db_array = db_select("discipline", array(), $order);

						
							foreach($db_array as $line){
								
								$discipline_id		 		= $line['discipline_id'];
								$discipline_name 				= $line['discipline_name'];
								
								$discipline_modify_ts 		= UnixToTime($line['discipline_modify_ts']);
								$discipline_modify_id 		= db_get_user($line['discipline_modify_id'])['user_name'];

								$hospitals = "";

								
								echo "
									<tr>
										<th>$discipline_name</th>
										<td>$hospitals</td>
							
										<td>$discipline_modify_ts<br>$discipline_modify_id</td>
										<td><a href='index.php?page=discipline_edit&discipline_id=$discipline_id'><span class='fa fa-edit'></span></a></td>
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