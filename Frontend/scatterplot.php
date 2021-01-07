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
	<title>Scatter Plot</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
            <h1 class="m-0">Scatter Plot</h1>
            <form method="post">
              <table class="table table-bordered" style="width: 1000px;">
                <tr>
                  <td>X axis:</td>
                  <td><select class="form-control" name="x-axis">
                    <option disabled="disabled" selected="selected">Select</option>
                    <?php
                      foreach ($columnArr as $column) {
                      ?>
                        <option value="<?=$column?>"><?=$column?></option>
                      <?php
                      }
                    ?>
                  </select></td>
                  <td>Y axis:</td>
                  <td><select name="y-axis[]" class="form-control" multiple="multiple">
                    <option disabled="disabled" selected="selected">Select</option>
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
    <section class="content">
      <div id="scatterplot"></div>
    </section>
</div>
<?php 
  if (isset($_POST["y-axis"]) and isset($_POST["x-axis"])) {
    $x_axis = $_POST["x-axis"]; 
    $columns = $_POST["y-axis"];
    $query = "SELECT * FROM `".$database_table."`";
    $res = mysqli_query($conn, $query);
    $rows = $res->fetch_all(MYSQLI_ASSOC);
    $x_axis_data = array_column($rows, $x_axis);  
    $table_data = array();
      for ($i=1; $i < count($columns)+1; $i++) { 
        $name = "column".$i;
        ${$name} = array_column($rows, $columns[$i-1]);
      array_push($table_data, ${$name});
    }
  }               
?>
<script>
    var columns = <?php echo '["' . implode('", "', $columns) . '"]' ?>;
    var table_data = <?php echo json_encode($table_data); ?>;
    var x_axis_data = <?php echo '["' . implode('", "', $x_axis_data) . '"]' ?>;
    var i=0;
    var data = [];
    for (i = 0; i < columns.length; i++) {
      var trace = {
        x: x_axis_data,
        y: table_data[i],
        mode: 'markers',
        name: columns[i],
        type: 'scatter',
        namefont: {
        family:  'Raleway, sans-serif'
      },
        marker: { size: 12}
      };
      data.push(trace);
    }
    
    TESTER = document.getElementById('scatterplot');
    Plotly.newPlot( TESTER, data, {
    margin: { t: 25 } } );
</script>
</body>
</html>
