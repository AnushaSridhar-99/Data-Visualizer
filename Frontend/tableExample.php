<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Visualizer Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    <link rel="stylesheet" href="dist/css/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/plotly/plotly-latest.min.js"></script>
    <style>
        td {
            text-align: center;
        }
    </style>
<?php
  include 'header.php';
?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Example - Table</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">                
                <div class="container">
                    <div class="card" style="width:100%; margin:auto">
                    <div class="card-body">
                        <div class="row mb-6 justify-content-center">
                            <div class="col-sm-6" id="table">
                                <script>
                                    var values = [
                                        ['Salaries', 'Office', 'Merchandise', 'Legal', '<b>TOTAL</b>'],
                                        [1200000, 20000, 80000, 2000, 12120000],
                                        [1300000, 20000, 70000, 2000, 130902000],
                                        [1300000, 20000, 120000, 2000, 131222000],
                                        [1400000, 20000, 90000, 2000, 14102000]]

                                    var data = [{
                                    type: 'table',
                                    header: {
                                        values: [["<b>EXPENSES</b>"], ["<b>Q1</b>"],
                                                    ["<b>Q2</b>"], ["<b>Q3</b>"], ["<b>Q4</b>"]],
                                        align: "center",
                                        line: {width: 1, color: 'black'},
                                        fill: {color: "grey"},
                                        font: {family: "Arial", size: 12, color: "white"}
                                    },
                                    cells: {
                                        values: values,
                                        align: "center",
                                        line: {color: "black", width: 1},
                                        font: {family: "Arial", size: 11, color: ["black"]}
                                    }
                                    }]
                                    table = document.getElementById("table");

                                    Plotly.newPlot(table, data);
                                </script>                    
                            </div>
                        </div>
                        </div>
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