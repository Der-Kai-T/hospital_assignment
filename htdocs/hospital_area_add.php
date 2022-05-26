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

<form action="index.php?page=hospital_area_add_script" method="POST">

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Krankenhaus einem Einsatzabschnitt zuweisen</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">
                        <div class="row">
                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="hospital">Krankenhaus</label><br>
                                        <select required class="form-control" name="hospital">
                                            <option selected disabled>--- bitte einen Eintrag auswählen ---</option>
                                            <?php
                                                $order = array();
                                                $order1['col'] = "hospital_name";
                                                $order1['dir'] = "ASC";
                                                
                                                array_push($order, $order1);
                                                
                                                $db_array = db_select("hospital", array(), $order);
                    
                                            
                                                foreach($db_array as $line){
                                                    $hospital_id    = $line['hospital_id'];
                                                    $hospital_name  = $line['hospital_name'];
                                                    echo("<option value='$hospital_id'>$hospital_name</option>\n");
                                                }


                                            ?>
                                        </select>
                                        
                                </div>
                            </div>

                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="area">Einsatzabschnitt</label><br>
                                        <select required class="form-control" name="area">
                                            <option selected disabled>--- bitte einen Eintrag auswählen ---</option>
                                            <?php
                                                $order = array();
                                                $order1['col'] = "area_name";
                                                $order1['dir'] = "ASC";
                                                
                                                array_push($order, $order1);
                                                
                                                $db_array = db_select("area", array(), $order);
                    
                                            
                                                foreach($db_array as $line){
                                                    $area_id    = $line['area_id'];
                                                    $area_name  = $line['area_name'];
                                                    echo("<option value='$area_id'>$area_name</option>\n");
                                                }


                                            ?>
                                        </select>
                                        
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