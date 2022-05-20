<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Debug</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item active">Debug</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
<pre><?php
echo"\$_SESSION=";
		print_r($_SESSION);
	?>
</pre>

<pre><?php
echo"User=";
		print_r(db_get_user($_SESSION['bkd_user_id']));
	?>
</pre>


<pre><?php
echo"\$_SERVER=";
		print_r($_SERVER);
	?>
</pre>