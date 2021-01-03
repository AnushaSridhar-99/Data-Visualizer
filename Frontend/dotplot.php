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
                            <h1 class="m-0">Example - Dotplot</h1>
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
                            <div class="col-sm-6" id="dotplot">
                                <script>
                                   var country = ['Switzerland (2011)', 'Chile (2013)', 'Japan (2014)', 'United States (2012)', 'Slovenia (2014)', 'Canada (2011)', 'Poland (2010)', 'Estonia (2015)', 'Luxembourg (2013)', 'Portugal (2011)'];

                                    var votingPop = [40, 45.7, 52, 53.6, 54.1, 54.2, 54.5, 54.7, 55.1, 56.6];

                                    var regVoters = [49.1, 42, 52.7, 84.3, 51.7, 61.1, 55.3, 64.2, 91.1, 58.9];

                                    var trace1 = {
                                    type: 'scatter',
                                    x: votingPop,
                                    y: country,
                                    mode: 'markers',
                                    name: 'Percent of estimated voting age population',
                                    marker: {
                                        color: 'rgba(156, 165, 196, 0.95)',
                                        line: {
                                        color: 'rgba(156, 165, 196, 1.0)',
                                        width: 1,
                                        },
                                        symbol: 'circle',
                                        size: 16
                                    }
                                    };

                                    var trace2 = {
                                    x: regVoters,
                                    y: country,
                                    mode: 'markers',
                                    name: 'Percent of estimated registered voters',
                                    marker: {
                                        color: 'rgba(204, 204, 204, 0.95)',
                                        line: {
                                        color: 'rgba(217, 217, 217, 1.0)',
                                        width: 1,
                                        },
                                        symbol: 'circle',
                                        size: 16
                                    }
                                    };

                                    var data = [trace1, trace2];

                                    var layout = {
                                    title: 'Votes cast for ten lowest voting age population in OECD countries',
                                    xaxis: {
                                        showgrid: false,
                                        showline: true,
                                        linecolor: 'rgb(102, 102, 102)',
                                        titlefont: {
                                        font: {
                                            color: 'rgb(204, 204, 204)'
                                        }
                                        },
                                        tickfont: {
                                        font: {
                                            color: 'rgb(102, 102, 102)'
                                        }
                                        },
                                        autotick: false,
                                        dtick: 10,
                                        ticks: 'outside',
                                        tickcolor: 'rgb(102, 102, 102)'
                                    },
                                    margin: {
                                        l: 140,
                                        r: 40,
                                        b: 50,
                                        t: 80
                                    },
                                    legend: {
                                        font: {
                                        size: 10,
                                        },
                                        yanchor: 'middle',
                                        xanchor: 'right'
                                    },
                                    width: 600,
                                    height: 600,
                                    paper_bgcolor: 'rgb(254, 247, 234)',
                                    plot_bgcolor: 'rgb(254, 247, 234)',
                                    hovermode: 'closest'
                                    };
                                    dotplot = document.getElementById("dotplot");

                                    Plotly.newPlot(dotplot, data, layout);
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