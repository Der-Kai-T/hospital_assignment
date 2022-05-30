<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?php echo($global_application_name_header);?>  Sperrung</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
          <li class="breadcrumb-item active">Sperrung</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<section class="content">

<form action="index.php?page=hospital_closure_add_script" method="POST">

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Krankenhaussperrung anlegen</h3>

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
                                    <label class="col-form-label" for="discipline">Fachrichtung</label><br>
                                        <select required class="form-control" name="discipline">
                                            <option selected disabled>--- bitte einen Eintrag auswählen ---</option>
                                            <?php
                                                $order = array();
                                                $order1['col'] = "discipline_name";
                                                $order1['dir'] = "ASC";
                                                
                                                array_push($order, $order1);
                                                
                                                $db_array = db_select("discipline", array(), $order);
                    
                                            
                                                foreach($db_array as $line){
                                                    $discipline_id    = $line['discipline_id'];
                                                    $discipline_name  = $line['discipline_name'];
                                                    echo("<option value='$discipline_id'>$discipline_name</option>\n");
                                                }


                                            ?>
                                        </select>
                                        
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="col-form-label" for="begin_day">Beginn</label> <a href="#" onclick="currentDate('begin_day')">heute</a><br>
                                    <input type="date" name="begin_day" class="form-control" id="begin_day">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="col-form-label" for="begin_time">Uhrzeit</label> <a href="#" onclick="currentTime('begin_time')">jetzt</a><br>
                                    <input type="time" name="begin_time" class="form-control" id="begin_time">
                                </div>
                            </div>

                            <div class="col-4">
                                
                            </div>
                            

                            <div class="col-2">
                                <div class="form-group">
                                    <label class="col-form-label" for="end_day">Ende</label> <a href="#" onclick="currentDate('end_day')">heute</a><br>
                                    <input type="date" name="end_day" class="form-control" id="end_day">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="col-form-label" for="end_time">Uhrzeit</label><br>
                                    <input type="time" name="end_time" class="form-control">
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