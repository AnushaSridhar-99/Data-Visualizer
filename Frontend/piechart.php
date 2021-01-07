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
	<title>Line Chart</title>
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
            <h1 class="m-0">Pie Chart</h1>
            <form method="post">
              <table class="table table-bordered" style="width: 1000px;">
                <tr>
                  <td>Columns:</td>
                  <td><select name="columns[]" class="form-control" multiple="multiple">
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
    <?php
      if (isset($_POST['columns'])) {
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
<?php 
  if (isset($_POST["columns"])) { 
    $columns = $_POST["columns"];
    $query = "SELECT * FROM `".$database_table."`";
    $res = mysqli_query($conn, $query);
    $rows = $res->fetch_all(MYSQLI_ASSOC);  
    $table_data = array();
    for ($i=1; $i < count($columns)+1; $i++) { 
      $value = array_column($rows, $columns[$i-1]);
      array_push($table_data, $value[0]);
    }
  }               
?>
<script>
    var columns = <?php echo '["' . implode('", "', $columns) . '"]' ?>;
    var table_data = <?php echo json_encode($table_data); ?>;
      var data = [{
        values: table_data,
        labels: columns,
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
