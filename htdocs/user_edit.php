
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

    <?php
        $where = array();
        $wh['col'] = "user_name";
        $wh['typ'] = "=";
        $wh['val'] = $_GET['user_name'];
        array_push($where, $wh);

        $wh['col'] = "user_id";
        $wh['typ'] = "=";
        $wh['val'] = $_GET['user_id'];        
        array_push($where, $wh);

        $db_array = db_select_injectable("user", $where);

        $user = $db_array[0];
    ?>


<!-- Main content -->
<section class="content">

<form action="index.php?page=user_edit_script" method="POST" autocomplete="off">
    <input type="hidden" name="user_name" value="<?php echo $user['user_name'];?>">
    <input type="hidden" name="user_id" value="<?php echo $user['user_id'];?>">

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Benutzer <?php echo $user['user_name']; ?> bearbeiten</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">
                       

                        <div class="row">
                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="password">Passwort </label>
                                    <input required type="password" name="password" id="password"  class="form-control" placeholder="" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\.\*_\-+,:;])[A-Za-z\d@$!%*?&\.\*_\-+,:;]{8,}$">
                                    <?php //source for regex: https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a ?>
                                </div>
                            </div>

                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="password_confirm">Passwort wiederholen</label>
                                    <input required type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="" oninput="check(this)">
                                </div>
                            </div>
                        </div>	

                        <div class="row">
                           <div class="col-8">
                               <p><b>Anforderungen an das Passwort:</b><br>
                               mindestens 8 Zeichen, davon:
                               <ul>
                                   <li>1 Großbuchstabe</li>
                                   <li>1 Kleinbuchstabe</li>
                                   <li>1 Ziffer</li>
                                   <li>1 Sonderzeichen: @$!%*?&.-_+* </li>
                                   
                        </div>	

                        <script language='javascript' type='text/javascript'>
                            function check(input) {
                                if (input.value != document.getElementById('password').value) {
                                    input.setCustomValidity('Passworts must match');
                                } else {
                                    // input is valid -- reset the error message
                                    input.setCustomValidity('');
                                }
                            }
                        </script>
                        
                    </div>

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Eintrag speichern</button>
                    </div>

                    
            </div>
        
    </div>
</div>


                    
            
</form>