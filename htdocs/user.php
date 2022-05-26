
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 class="m-0"><?php echo($global_application_name_header);?>  Benutzerverwaltung</h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item active">Benutzerverwaltung</li>
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
				<h3 class="card-title">Benutzerliste</h3>

				<div class="card-tools">
					<a href="index.php?page=user_add" title="neuen Benutzer anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Username</th>
								
								<th>bearbeitet von</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							

						
							$order = array();
							$order1['col'] = "user_name";
							$order1['dir'] = "ASC";
							
							array_push($order, $order1);
							
							$db_array = db_select("user", array(), $order);

						
							foreach($db_array as $line){
								
								$user_id		 		= $line['user_id'];
								$user_name		 		= $line['user_name'];
								$user_admin	 		    = $line['user_admin'];
								
                                if($user_admin == 1){
                                    $admin = "<i class='fas fa-toolbox'></i>";
                                }else{
                                    $admin = "";
                                }
								$user_modify_ts 		= UnixToTime($line['user_modify_ts']);
								$user_modify_id 		= db_get_user($line['user_modify_id'])['user_name'];

								echo "
									<tr>
										<th>$user_name $admin</th>
										
										
										
										<td>$user_modify_ts<br>$user_modify_id</td>
										<td><a href='index.php?page=user_edit&user_id=$user_id&user_name=$user_name'><span class='fa fa-edit'></span></a></td>
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