<!DOCTYPE html>
<html lang="en">
<?php
  include 'header.php';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Visualizer Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <script src="plugins/jquery/jquery.js"></script> 
  <style>
    td{
      text-align: center;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content"> 
      <div class="card" style="width: 56%; margin: auto;">
        <div class="card-body">
      <form method="post" enctype="multipart/form-data">
        <table style="margin: auto;" cellpadding="10px">
          <tr>
            <td style="text-align: right; width: 200px;"><label for="csvFile">Upload csv file: </label></td>
            <td><input type="file" accept=".csv" name="csvFile" id="csvFile"></td>
          </tr>
          <tr>
            <td colspan="2"><button class="btn btn-primary" type="submit" name="submit">Submit</button></td>
          </tr>
          
              <?php
        if ( isset($_POST["submit"]) ) {
          ?>
          <tr>
            <td colspan="2">
          <?php

            if ( isset($_FILES["csvFile"])) 
            {

                //if there was an error uploading the file
                if ($_FILES["csvFile"]["error"] > 0) 
                {
                    echo "Return Code: " . $_FILES["csvFile"]["error"] . "<br />";

                }
                else 
                {
                         //Print file details
                     echo "Type: " . $_FILES["csvFile"]["type"] . "<br />";
                     echo "Size: " . ($_FILES["csvFile"]["size"] / 1024) . " Kb<br />";
                         //if file already exists
                     if (file_exists("upload/" . $_FILES["csvFile"]["name"])) {
                    echo $_FILES["csvFile"]["name"] . " already exists. ";
                     }
                     else {
                            //Store file in directory "upload" with the name of "uploaded_file.txt"
                    $storagename = $_FILES["csvFile"]["name"];
                    move_uploaded_file($_FILES["csvFile"]["tmp_name"], "upload/" . $storagename);
                    echo "Stored in: " . "upload/" . $_FILES["csvFile"]["name"] . "<br />";
                    }
                    $execpath =  str_replace("\\","\\\\\\\\", dirname(__FILE__)) . "\\\\\\\InsertCSV.py";                    
                    $retval =  exec("python " .$execpath. " " .$_FILES["csvFile"]["name"]);
                    if ($retval == 1) 
                    {   
                      echo "<br/> Inserted to DB successfully";                      
                      echo "<table class =\"table table-bordered table-striped\">\n\n";
                      $f = fopen("upload/".$_FILES["csvFile"]["name"], "r");
                      while (($line = fgetcsv($f)) !== false) {
                              echo "<tr>";
                              foreach ($line as $cell) {
                                      echo "<td>" . htmlspecialchars($cell) . "</td>";
                              }
                              echo "</tr>\n";
                      }
                      fclose($f);
                      echo "\n</table>";

                    }

                    else if ($retval == 0)
                    {
                      echo "<br/> Connection to DB failed";
                    }
                    else{
                      echo "<br/> Inserting to DB Failed";
                    }
                    
                }
            } 
            else 
            {
              echo "No file selected <br />";
            }
           ?>
           </td>
          </tr>
        <?php
        }
        ?>
            
        </table>  
      </form>
      </div>
    </div>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong></strong>
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>
</div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
