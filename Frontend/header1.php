<?php 

?>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
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
  <script src="plugins/plotly/plotly-latest.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="plugins/Semantic-UI-CSS-master/semantic.min.css">
  <script src="plugins/Semantic-UI-CSS-master/semantic.min.js"></script>
  <style>
    #loader { 
            border: 12px solid #f3f3f3; 
            border-radius: 50%; 
            border-top: 12px solid #444444; 
            width: 70px; 
            height: 70px; 
            animation: spin 1s linear infinite; 
        } 
          
        @keyframes spin { 
            100% { 
                transform: rotate(360deg); 
            } 
        } 
          
        .center { 
            position: absolute; 
            top: 0; 
            bottom: 0; 
            left: 0; 
            right: 0; 
            margin: auto; 
        } 
        .navbar-nav { 
            margin-left: auto; 
        } 
</style>
 
<div id="loader" class="center"></div> 

  <!-- Navbar -->
  
      <div class="row">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="scatterplot.php" class="nav-link">Scatter Plot</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="linechart.php" class="nav-link">Line Chart</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="barchart.php" class="nav-link">Bar Chart</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="piechart.php" class="nav-link">Pie Chart</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="dotplot.php" class="nav-link">Dot Plot</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="table.php" class="nav-link">Table</a>
          </li>
      </ul>
    </nav>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light  navbar-expand-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
          </li>
    </ul>   
  </nav>
</div>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="dist/img/DV.png" alt="Data Visualizer Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Data Visualizer</span>
    </div>

    <!-- Sidebar -->
    <!-- <div class="sidebar"> -->
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a class="nav-link" href="scatterplotExample.php">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Scatter Plot
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="linechartExample.php">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Line Chart
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="barchartExample.php">
              <i class="nav-icon fas fa-chart-bar" aria-hidden="true"></i>
              <p>
                Bar Chart
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="piechartExample.php">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Pie Chart
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dotplotExample.php">
              <i class="nav-icon fas fa-braille"></i>
              <p>
                Dot Plot
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tableExample.php">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Table
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

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

<script> 
      document.onreadystatechange = function() { 
          if (document.readyState !== "complete") { 
              document.querySelector( 
                "body").style.visibility = "hidden"; 
              document.querySelector( 
                "#loader").style.visibility = "visible"; 
          } else { 
              document.querySelector( 
                "#loader").style.display = "none"; 
              document.querySelector( 
                "body").style.visibility = "visible"; 
          } 
      }; 
</script> 
