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
<?php
        $where = array();
        $wh['col'] = "area_id";
        $wh['typ'] = "=";
        $wh['val'] = $_GET['area_id'];
        array_push($where, $wh);

        
        $db_array = db_select("area", $where);

        $area = $db_array[0];
    ?>


<!-- Main content -->
<section class="content">

<form action="index.php?page=area_edit_script" method="POST">
    <input type="hidden" name="area_id" value="<?php echo $area['area_id']; ?>">
    <input type="hidden" name="area_name_old" value="<?php echo $area['area_name']; ?>">

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Einsatzabschnitt <?php echo $area['area_name']; ?> bearbeiten</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">
                        <div class="row">
                            <div class="col-12">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="area_name">Name</label>
                                    <input autofocus required type="text" name="area_name"  class="form-control" placeholder="Name des Einsatzabschnittes" value="<?php echo $area['area_name']; ?>">
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