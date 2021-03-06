<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	include 'header1.php';
	include 'connection.php';
	$database_table = $_SESSION['fileName'];
  if ($conn && $db)
   {
    
    $col_name_query = mysqli_query($conn, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'datavisualizer' AND TABLE_NAME = '".$database_table."'");
    $result = $col_name_query->fetch_all(MYSQLI_ASSOC);

    // Array of all column names
    $columnArr = array_column($result, 'COLUMN_NAME');
    
    
  }
  else
  {
    echo "connection failed";
  }
  
?>
<head>
	<title>Pie Chart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.js"></script>
	<style>
	    td{
	      text-align: center;
	    }
	</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
          <li class="nav-item d-none d-sm-inline-block active">
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

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pie Chart</h1>
            <form method="post">
              <table class="table table-bordered" style="width: 1000px;">
                <tr>
                  <td>Values:</td>
                  <td><select name="values" id="values" class="ui fluid selection dropdown">
                    <?php
                      foreach ($columnArr as $column) {
                    ?>
                        <option value="<?=$column?>"><?=$column?></option>
                    <?php
                      }
                    ?>
                    </select>
                  </td>
                  <td>Labels:</td>
                  <td><select name="labels" id="labels" class="ui fluid selection dropdown">
                    <?php
                      foreach ($columnArr as $column) {
                    ?>
                        <option value="<?=$column?>"><?=$column?></option>
                    <?php
                      }
                    ?>
                    </select>
                  </td>
                  <td class="text-center"><button class="btn btn-primary" type="buttons">Generate</button></td>
                </tr>
              </table>
            </form>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
      if (isset($_POST['values'])) {
    ?>
    
    <div class="container">
      <div class="card" style="width:100%; margin:auto">
        <div class="card-body">
          <div class="row mb-6 justify-content-center">
            <div id="piechart"></div>   
          </div>
        </div>
      </div>
    </div>
    <?php
      }
    ?>
</div>
</div>
<script>
  $('#values').dropdown();
  $('#labels').dropdown();
</script>
<?php 
  if (isset($_POST["values"]) and isset($_POST["labels"])) { 
    $value_name = $_POST["values"];
    $label_name = $_POST["labels"];
    $query = "SELECT * FROM `".$database_table."`";
    $res = mysqli_query($conn, $query);
    $rows = $res->fetch_all(MYSQLI_ASSOC);  
    $values = array_column($rows, $value_name);
    $labels = array_column($rows, $label_name);
  }               
?>
<script>
    var values = <?php echo '["' . implode('", "', $values) . '"]' ?>;
    var labels = <?php echo '["' . implode('", "', $labels) . '"]' ?>;
      var data = [{
        values: values,
        labels: labels,
        type: 'pie'
      }];
      var layout = {
        height: 400,
        width: 500
      };
      piechart = document.getElementById("piechart");

      Plotly.newPlot(piechart, data, layout);

</script>
</body>
</html>
