
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


<section class="content">



<div class="row">
  <div class="col-12">
    <div class="card bg-info">
      <div class="card-header">
        <h3 class="card-title">Disclaimer</h3>
        <div class="card-tools"></div>
      </div>
      <div class="card-body" style="height: auto;">
      <p>Die Anwendung ist derzeit im Status "Alpha". Sie ist noch nicht vollständig und wird laufend weiterentwickelt. Fehler können und werden auftreten.</p>
      </div>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Beschreibung</h3>
        <div class="card-tools"></div>
      </div>
      <div class="card-body" style="height: auto;">
        <p>Für die Großveranstaltung Schlagermove mit einer hohen Zahl an Transporten in kurzer Zeit in die Krankenhäuser in Hamburg durch eine mittlere zweistellige Zahl an Rettungsmitteln besteht der Bedarf der Koordinierung der Krankenhauskapazitäten, damit die nahe zur Veranstaltung gelegenen Krankenhäuser nicht durch leichtverletzte Patienten belegt werden und für schwerwiegend Verletzte längere Fahrstrecken benötigt werden. </p>
        <p>Jedem Krankenhaus kann eine Kapazität (in Punkten) zugewiesen werden, wie viel sie gleichzeitig leisten können. Jedem Patient wird eine "schwere" in Form von Punkten (von 1-10) und Dauer (wie lange die Kapazität im Krankenhaus belegt wird) zugewiesen. Über im Vorwege festgelegte Stichworte wird die Auswahl vereinfacht.</p>
        <p><b>Datenschutzhinweis:</b><br>
        Es erfolgt keine Erhebung von Personenbezogenen Daten. Jeder Patient wird lediglich über die Einsatznummer des verwendeten Einsatzleitsystems identifiziert. Zusätzlich kann die verwendete Transportressource zur Übersicht mit angegeben werden</p>
      </div>
    </div>
  </div>
</div>


<?php
  $software = array();

  $s['link'] = "https://adminlte.io/themes/v3/";
  $s['name'] = "Template: Admin LTE3";
  array_push($software, $s);

  $s['link'] = "https://getbootstrap.com/";
  $s['name'] = "based on bootstrap 4";
array_push($software, $s);


  $s['link'] = "https://fontawesome.com/v5/";
  $s['name'] = "Icon-Library Fontawesome V.5";
array_push($software, $s);

  $s['link'] = "https://ionic.io/ionicons";
  $s['name'] = "Icon-Library Ionicons";
array_push($software, $s);
 
  $s['link'] = "https://getdatepicker.com/5-4/";
  $s['name'] = "Tempus Dominus";
array_push($software, $s);
  
  $s['link'] = "https://github.com/bantikyan/icheck-bootstrap";
  $s['name'] = "icheck Bootstrap";
array_push($software, $s);

  $s['link'] = "https://github.com/10bestdesign/jqvmap/";
  $s['name'] = "jqvmap (Clickable Maps)";
array_push($software, $s);

  $s['link'] = "https://kingsora.github.io/OverlayScrollbars/#!overview";
  $s['name'] = "Overlay Scrollbars";
array_push($software, $s);

  $s['link'] = "https://www.daterangepicker.com/";
  $s['name'] = "Date Range Picker";
array_push($software, $s);

  $s['link'] = "https://summernote.org/";
  $s['name'] = "Summernote";
array_push($software, $s);

  $s['link'] = "https://datatables.net/";
  $s['name'] = "Data Tables";
array_push($software, $s);

  $s['link'] = "https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700";
  $s['name'] = "Google Font (Source Sans Pro) via fonts.googleapis.com (CDN)";
array_push($software, $s);

  $s['link'] = "https://jquery.com/";
  $s['name'] = "JQuery";
array_push($software, $s);

  $s['link'] = "https://www.chartjs.org/";
  $s['name'] = "chart.js";
array_push($software, $s);

  $s['link'] = "https://omnipotent.net/jquery.sparkline/#s-about";
  $s['name'] = "Sparklines";
array_push($software, $s);

  $s['link'] = "http://www.fpdf.org/";
  $s['name'] = "FPDF-Library (Berichtserstellung) erweitert mit";
  $s['ul']   = "start";
array_push($software, $s);
$s = array();

  $s['link'] = "http://www.fpdf.org/en/script/script2.php";
  $s['name'] = "Text Rotation";  
array_push($software, $s);

  $s['link'] = "https://stackoverflow.com/questions/11126354/fpdf-letter-spacing";
  $s['name'] = "Letter Spacing";    
array_push($software, $s);

  $s['link'] = "http://www.fpdf.org/en/script/script88.php";
  $s['name'] = "Code 128 Barcodes";
array_push($software, $s);

  $s['link'] = "https://github.com/myokyawhtun/PDFMerger";
  $s['name'] = "PDF-Merger";
  $s['ul']   = "stop";
array_push($software, $s);
$s = array();


  $s['link'] = "https://github.com/Darkflib/php-qrcode";
  $s['name'] = "PHP QR-Code";
  array_push($software, $s);


  $s['link'] = "https://github.com/PHPMailer/PHPMailer";
  $s['name'] = "PHPMailer";
  array_push($software, $s);



?>



<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Verwendete Software</h3>
        <div class="card-tools"></div>
      </div>
      <div class="card-body" style="height: auto;">
        <p>Dieses Projekt verwendet u.a. folgende weitere Librarys (teilweise durch das Template eingebunden). Sofern nicht anders angegeben, werden die Librarys vom selben Webserver ausgeliefert und nicht von einem CDN.</p>
        
        <ul>
          <?php
            foreach($software as $s){
              
              $name = $s['name'];
              $link = $s['link'];

              if(isset($s['ul'])){
                if($s['ul'] == "start"){
                  $eol = "<ul>";
                }else{
                  $eol = "</li></ul></li>";
                }
              }else{
                $eol = "</li>";
              }
              if($name != ""){
                echo "<li>$name <a href='$link' target='_blanck'>$link <i class='fas fa-external-link-alt'></i></a>$eol\n";
              }else{
                echo "<br>";
              }
            }
          ?>
          
        </ul>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Open Source</h3>
        <div class="card-tools"></div>
      </div>
      <div class="card-body" style="height: auto;">
        <p>Diese Webanwendung wird als Open-Source-Anwendung zur Verfügung gestellt. Sie kommt ohne jegliche Garantien und wird as-is (so wie sie ist) zur Verfügung gestellt.</p>
        <p>Das dazugehörige Repository ist <a href='https://github.com/Der-Kai-T/hospital_assignment' target='_blanck'>https://github.com/Der-Kai-T/hospital_assignment <i class='fas fa-external-link-alt'></i></a>
      </div>
    </div>
  </div>
</div>