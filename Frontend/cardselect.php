<!DOCTYPE html>
<html lang="en">
<?php
  include 'header.php';

  $fileName = $_POST["fileName"];
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Visualizer Dashboard</title>
    <link rel="stylesheet" href="dist/css/adminlte.css">
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="dist/img/DV.png" alt="Avatar" style="width:300px;height:300px;">
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>John Doe</h1>
                                        <p>Architect & Engineer</p>
                                        <p>We love that guy</p>
                                    </div>
                                </div>
                            </div>
                        </div>  
                         <div class="col-md-4">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="dist/img/DV.png" alt="Avatar" style="width:300px;height:300px;">
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>John Doe</h1>
                                        <p>Architect & Engineer</p>
                                        <p>We love that guy</p>
                                    </div>
                                </div>
                            </div>
                        </div>             
                         <div class="col-md-4">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <img src="dist/img/DV.png" alt="Avatar" style="width:300px;height:300px;">
                                        <script>
                                            $('.flip-card .flip-card-inner').click(function() {
                                            $(this).closest('.flip-card').toggleClass('hover');
                                            $(this).css('transform, rotateY(180deg)');
                                            });
                                        </script>
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>John Doe</h1>
                                        <p>Architect & Engineer</p>
                                        <p>We love that guy</p>
                                    </div>
                                </div>
                            </div>
                        </div>                                   
                       
                    </div>
                </div>
            </section>
            <div style="margin-top: 120px; text-align: center;">
            <form method="post" action="plot.php">
                <input type="text" readonly="readonly" name="fileName" value="<?=$fileName?>">

                <button class="btn btn-primary" type="submit" name="submit">Plot Graph</button>
            </form>
        </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        
        <footer class="main-footer">
            <strong></strong>
            <div class="float-right d-none d-sm-inline-block">

            </div>
        </footer>
    </div>

</body>

</html>