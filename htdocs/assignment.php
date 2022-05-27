
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?>  Zuweisung (Zufallsdaten!)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item active">Zuweisung</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




<!-- Main content -->
<section class="content">
<?php include("include/html_result.php"); ?>

<?php
    //load hospitals

    if(isset($_GET['area'])){
        $area = $_GET['area'];
        $sql		= "SELECT * FROM hospital h, hospital_area l WHERE h.hospital_id = l.hospital_id AND l.area_id = :area ORDER BY hospital_name ASC";
    }else{
        $sql		= "SELECT * FROM hospital ORDER BY hospital_name ASC";
    }

    $db_array   = array();

   
															
    $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
    
    $statement	= $pdo->prepare($sql);
    if(isset($_GET['area'])){
        $area = $_GET['area'];
        $statement->bindParam(':area', $area);
    }else{

    }
  
    
    $statement->execute();
    
    
    while($row = $statement->fetch()){
        foreach ($row as $key => $value){
            $row[$key] = db_parse($value);
        }
        array_push($db_array, $row);
    }


//TODO remove just for demonstrating purposes
    $bg_colors[0] = "";
    $bg_colors[1] = "bg-success";
    $bg_colors[2] = "bg-warning";
    $bg_colors[3] = "bg-danger";
    $bg_colors[4] = "bg-indigo";


    $i = 0;
    $cols = 4;
    $col_wdth = floor(12/$cols);
    foreach($db_array as $line){
        $i++;

        if($i == 1){
            echo "<div class='row'>";
        }

        $hospital_name        = $line['hospital_name'];
        $hospital_id          = $line['hospital_id'];
        $hospital_capacity    = $line['hospital_capacity'];
      
        $hospital_occupied    = rand(0,$hospital_capacity+3);

        $hospital_occupied_percent = ($hospital_occupied/$hospital_capacity)*100;

        if($hospital_occupied_percent > 100){
            $bg_color = $bg_colors[4];
        }else if($hospital_occupied_percent > 90){
            $bg_color = $bg_colors[3];
        }else if($hospital_occupied_percent > 50){
            $bg_color = $bg_colors[2];
        }else {
            $bg_color = $bg_colors[1];
        }

        $hospital_space = $hospital_capacity - $hospital_occupied;

        $next_free_capacity = rand(1,5);
        $next_free_time     = rand(4,15);

        if(isset($_GET['short'])){
            echo "
            <div class='col-$col_wdth'>
                <div class='info-box $bg_color' id='hospital_$hospital_id'>

                    <span class='info-box-icon'>$hospital_space
                    </span>

                    <div class='info-box-content'>
                        <span class='info-box-text'>$hospital_name ($hospital_id)</span>
                        <span class='info-box-number'>nächster frei $next_free_capacity in $next_free_time min</span>
                    </div>
                </div>
            </div>


        ";
        }else{
            echo "
            <div class='col-$col_wdth'>
                <div class='card $bg_color' id='hospital_$hospital_id'>
                    <div class='card-header'>
                        <h3 class='card-title'>$hospital_name ($hospital_id)</h3>
                    </div>
                        
                    <div class='card-body table p-0'>
                        <table border='0' width='100%'>
                            <tr>
                                <th>Belegt:</th>
                                <td>$hospital_occupied von $hospital_capacity <b>noch $hospital_space frei</b></td>
                            <tr>
                            <tr>
                                <th>nächster frei:</th>
                                <td>$next_free_capacity in $next_free_time min</td>
                            <tr>
                        </table>
                    </div>
                </div>
            </div>
            
            ";
        }
        


        if($i == $cols){
            echo "</div>";
            $i = 0;
        }

    }

?>