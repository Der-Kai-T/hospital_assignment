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
<?php
        $where = array();
        $wh['col'] = "discipline_id";
        $wh['typ'] = "=";
        $wh['val'] = $_GET['discipline_id'];
        array_push($where, $wh);

        
        $db_array = db_select("discipline", $where);

        $discipline = $db_array[0];
    ?>

<!-- Main content -->
<section class="content">

<form action="index.php?page=discipline_edit_script" method="POST">
<input type="hidden" name="discipline_id" value="<?php echo $discipline['discipline_id'];?>">
<input type="hidden" name="discipline_name_old" value="<?php echo $discipline['discipline_name'];?>">
<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Fachrichtung <?php echo $discipline['discipline_name'];?> bearbeiten</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">
                        <div class="row">
                            <div class="col-12">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="discipline_name">Name</label>
                                    <input autofocus required type="text" name="discipline_name"  class="form-control" placeholder="Name der Fachrichtung" value="<?php echo $discipline['discipline_name'];?>">
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