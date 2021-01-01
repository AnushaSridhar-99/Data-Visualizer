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
<!DOCTYPE html>
<html lang="en">
<?php
  include 'header.php';
?>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Plot graph</title>
	<script src="plugins/plotly/plotly-latest.min.js"></script>
	
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
            <h1 class="m-0">Graph</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	<div id="tester"></div>	
</div>
</div>
<script>
		var column1 = <?php echo '["' . implode('", "', $column1) . '"]' ?>; 
		var column2 = <?php echo '["' . implode('", "', $column2) . '"]' ?>; 
		var column3 = <?php echo '["' . implode('", "', $column3) . '"]' ?>; 

		var trace1 = {
		  x: column1,
		  y: column2,
		  mode: 'lines+markers',
		  type: 'scatter'
		};
		var trace2 = {
			x:column1,
			y:column3,
			mode: 'lines',
			type: 'scatter'
		};
		var data = [trace1,trace2];
		
		TESTER = document.getElementById('tester');
		Plotly.newPlot( TESTER, data, {
		margin: { t: 25 } } );
</script>
</body>
	
</html>
