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
                            <h1 class="m-0">Example - Line Chart</h1>
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
                            <div class="col-sm-6" id="linechart">
                                <script>
                                    trace1 = {
                                    type: 'scatter',
                                    x: [1, 2, 3, 4],
                                    y: [10, 15, 13, 17],
                                    mode: 'lines',
                                    name: 'Red',
                                    line: {
                                        color: 'rgb(219, 64, 82)',
                                        width: 3
                                    }
                                    };

                                    trace2 = {
                                    type: 'scatter',
                                    x: [1, 2, 3, 4],
                                    y: [12, 9, 15, 12],
                                    mode: 'lines',
                                    name: 'Blue',
                                    line: {
                                        color: 'rgb(55, 128, 191)',
                                        width: 1
                                    }
                                    };

                                    var layout = {
                                    width: 500,
                                    height: 500
                                    };

                                    var data = [trace1, trace2];
                                    scatterplot = document.getElementById("linechart");

                                    Plotly.newPlot(linechart, data, layout);
                                </script>                    
                            </div>
                        </div>
                        </div>
                    </div>
                     <div class="card" style="width:100%; margin:auto">
                    <div class="card-body">
                        <div class="row mb-6 justify-content-center">
                            <div class="col-sm-6" id="datatable">
                                <script> 
                                    var values_table = [[1,2,3,4],[10, 15, 13, 17],[12, 9, 15, 12]];                                
                                    var data_table = [{
                                    type: 'table',
                                    header: {
                                        values: ['x','y1','y2'],
                                        align: "center",
                                        line: {width: 1, color: 'black'},
                                        fill: {color: "grey"},
                                        font: {family: "Arial", size: 12, color: "white"}
                                    },
                                    cells: {
                                        values: values_table,
                                        align: "center",
                                        line: {color: "black", width: 1},
                                        font: {family: "Arial", size: 11, color: ["black"]}
                                    }
                                    }];

                                    Plotly.newPlot(datatable, data_table);
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