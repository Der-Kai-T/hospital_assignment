    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?>  Krankenhaus</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item active">Krankenhaus</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">

	<form action="index.php?page=hospital_add_script" method="POST">

	<div class="row">
		<div class="col-12">
			
				<div class="card">
						<div class="card-header">
							<h3 class="card-title">neues Krankenhaus anlegen</h3>

							<div class="card-tools">
								
							</div>
						</div>
						
						<div class="card-body" style="height: auto;">
							<div class="row">
								<div class="col-4">
								
									<div class="form-group">
										<label class="col-form-label" for="hospital_name">Name</label>
										<input required type="text" name="hospital_name"  class="form-control" placeholder="Name des Krankenhauses">
									</div>
								</div>

                                <div class="col-4">
								
									<div class="form-group">
										<label class="col-form-label" for="hospital_name">Abkürzung</label>
										<input required type="text" name="hospital_name"  class="form-control" placeholder="wird an Orten verwendete, an denen weniger Platz ist">
									</div>
								</div>

								<div class="col-4">
								
									<div class="form-group">
										<label class="col-form-label" for="hospital_capacity">Kapazität</label>
										<input required type="number" name="hospital_capacity"  class="form-control" placeholder="Zeitgleiche Kapazität">
									</div>
								</div>


								
								
							</div>	

							<div class="row">
								<div class="col-8">
								
									<div class="form-group">
										<label class="col-form-label" for="hospital_street">Straße</label>
										<input required type="text" name="hospital_street"  class="form-control" placeholder="">
									</div>
								</div>

                                <div class="col-4">
								
									<div class="form-group">
										<label class="col-form-label" for="hospital_number">Hausnummer</label>
										<input required type="text" name="hospital_number"  class="form-control" placeholder="">
									</div>
								</div>
							</div>	

							<div class="row">
								<div class="col-3">
								
									<div class="form-group">
										<label class="col-form-label" for="hospital_zip">PLZ</label>
										<input required type="text" name="hospital_zip"  class="form-control" placeholder="">
									</div>
								</div>

                                <div class="col-9">
								
									<div class="form-group">
										<label class="col-form-label" for="hospital_town">Ort</label>
										<input required type="text" name="hospital_town"  class="form-control" placeholder="">
									</div>
								</div>
							</div>	

							
							
						</div>

						<div class="card-footer">
						<button type="submit" class="btn btn-primary">Eintrag speichern</button>
						</div>

						
				</div>
			
		</div>
	</div>


						
				
	</form>