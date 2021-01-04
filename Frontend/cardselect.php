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

<?php 
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "datavisualizer";

	$conn = mysqli_connect($host, $user, $password);   
	$db = mysqli_select_db($conn, $database);
	$database_table = $_POST['fileName'];
	
	if ($conn && $db)
	 {
	 	
		$col_name_query = mysqli_query($conn, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'datavisualizer' AND TABLE_NAME = '".$database_table."'");
		$result = $col_name_query->fetch_all(MYSQLI_ASSOC);

		// Array of all column names
		$columnArr = array_column($result, 'COLUMN_NAME');
		$query = "SELECT * FROM `".$database_table."`";
		$res = mysqli_query($conn, $query);
		$rows = $res->fetch_all(MYSQLI_ASSOC);
		for ($i=1; $i < count($columnArr)+1; $i++) { 
			$name = "column".$i;
			${$name} = array_column($rows, $columnArr[$i-1]);
		}
		
		
	}
	else
	{
		echo "connection failed";
	}
	
?>

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
                    <form method="POST">
                        <div class="col-md-4">
                            <div class="flip-card" id="fc1">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <h2>SCATTER PLOT</h1>
                                        <img src="dist/img/scatterplot.png" alt="Avatar" style="width:200px;height:200px;">                
                                        <script>
                                            $(document.getElementById('fc1')).click(function() {
                                            $(this).closest('.flip-card').toggleClass('hover');
                                            $(this).css('transform, rotateY(180deg)');
                                            });
                                        </script>
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>SCATTER PLOT</h1>
                                        <p>X</P>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>
                                        <p>Y</p>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>
                                    </div>
                                </div>
                            </div>
                        </div>                      
                       <div class="col-md-2">
                            <div class="flip-card" id="fc2">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <h2>LINE CHART</h2>
                                        <img src="dist/img/linechart.png" alt="Avatar" style="width:200px;height:200px;">
                                        <script>
                                            $(document.getElementById('fc2')).click(function() {
                                            $(this).closest('.flip-card').toggleClass('hover');
                                            $(this).css('transform, rotateY(180deg)');
                                            });
                                        </script>
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>SCATTER PLOT</h1>
                                        <p>X</P>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>
                                        <p>Y</p>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>
                                    </div>
                                </div>
                            </div>
                        </div>             
                        <div class="col-md-4">
                            <div class="flip-card" id="fc3">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <h2>BAR CHART</h2>
                                        <img src="dist/img/barchart.png" alt="Avatar" style="width:200px;height:200px;"/>
                                        <script>
                                            $(document.getElementById('fc3')).click(function() {
                                            $(this).closest('.flip-card').toggleClass('hover');
                                            $(this).css('transform, rotateY(180deg)');
                                            });
                                        </script>
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>SCATTER PLOT</h1>
                                        <p>X</P>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>
                                        <p>Y</p>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <div class="col-md-4">
                            <div class="flip-card" id="fc4">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <h2>PIE CHART</h2>
                                        <img src="dist/img/piechart.png" alt="Avatar" style="width:200px;height:200px;">
                                        <script>
                                            $(document.getElementById('fc4')).click(function() {
                                            $(this).closest('.flip-card').toggleClass('hover');
                                            $(this).css('transform, rotateY(180deg)');
                                            });
                                        </script>
                                    </div>
                                    <div class="flip-card-back">
                                         <h1>SCATTER PLOT</h1>
                                        <p>X</P>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>
                                        <p>Y</p>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>
                                    </div>
                                </div>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="flip-card" id="fc5">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <h2>DOT PLOT</h2>
                                        <img src="dist/img/dotplot.png" alt="Avatar" style="width:200px;height:200px;">
                                        <script>
                                            $(document.getElementById('fc5')).click(function() {
                                            $(this).closest('.flip-card').toggleClass('hover');
                                            $(this).css('transform, rotateY(180deg)');
                                            });
                                        </script>
                                    </div>
                                    <div class="flip-card-back">
                                        <h1>SCATTER PLOT</h1>
                                        <p>X</P>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>
                                        <p>Y</p>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>
                                    </div>
                                </div>
                            </div>
                        </div>         
                        <div class="col-md-4">
                            <div class="flip-card" id="fc6">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <h2>TABLE</h2>
                                        <img src="dist/img/table.png" alt="Avatar" style="width:200px;height:200px;">
                                        <script>
                                            $(document.getElementById('fc6')).click(function() {
                                            $(this).closest('.flip-card').toggleClass('hover');
                                            $(this).css('transform, rotateY(180deg)');
                                            });
                                        </script>
                                    </div>
                                    <div class="flip-card-back">
                                         <h1>SCATTER PLOT</h1>
                                        <p>X</P>
                                        <?php
                                        for ($i=1; $i < count($columnArr)+1; $i++) { 
                                                echo '<input type="checkbox" id="sp'.$i.'">'.$columnArr[$i-1].'</input><br/>';
                                        }?>                                     
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </form>                                                                                            
                    </div>
                </div>
            </section>
            <div style="margin-top: 10px; text-align: center;">
            <form method="post" action="plot.php">
                <input type="hidden" name="fileName" value="<?=$fileName?>">
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