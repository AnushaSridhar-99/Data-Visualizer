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

    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Example - Scatterplot</h1>
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
                            <div class="col-sm-6" id="scatterplot">
                                <script>
                                    var trace1 = {
                                    x: [1, 2, 3, 4, 5],
                                    y: [1, 6, 3, 6, 1],
                                    mode: 'markers+text',
                                    type: 'scatter',
                                    name: 'Team A',
                                    text: ['A-1', 'A-2', 'A-3', 'A-4', 'A-5'],
                                    textposition: 'top center',
                                    textfont: {
                                        family:  'Raleway, sans-serif'
                                    },
                                    marker: { size: 12 }
                                    };

                                    var trace2 = {
                                    x: [1.5, 2.5, 3.5, 4.5, 5.5],
                                    y: [4, 1, 7, 1, 4],
                                    mode: 'markers+text',
                                    type: 'scatter',
                                    name: 'Team B',
                                    text: ['B-a', 'B-b', 'B-c', 'B-d', 'B-e'],
                                    textfont : {
                                        family:'Times New Roman'
                                    },
                                    textposition: 'bottom center',
                                    marker: { size: 12 }
                                    };

                                    var data = [ trace1, trace2 ];

                                    var layout = {
                                    xaxis: {
                                        range: [ 0.75, 5.25 ]
                                    },
                                    yaxis: {
                                        range: [0, 8]
                                    },
                                    legend: {
                                        y: 0.5,
                                        yref: 'paper',
                                        font: {
                                        family: 'Arial, sans-serif',
                                        size: 20,
                                        color: 'grey',
                                        }
                                    },
                                    title:'Data Labels on the Plot'
                                    };
                                    scatterplot = document.getElementById("scatterplot");

                                    Plotly.newPlot(scatterplot, data, layout);
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