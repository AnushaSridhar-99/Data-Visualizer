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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table</title>
    <script src="plugins/jquery/jquery.js"></script>
    <script src="plugins/plotly/plotly-latest.min.js"></script>
    <style>
        td {
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
                            <h1 class="m-0">Table</h1>
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
                if (isset($_POST["columns"])) {
                        $columns = $_POST["columns"];
                        $query = "SELECT * FROM `".$database_table."`";
                        $res = mysqli_query($conn, $query);
                        $rows = $res->fetch_all(MYSQLI_ASSOC);
                        
                        $table_data = array();
                        for ($i=1; $i < count($columns)+1; $i++) { 
                            $name = "column".$i;
                            ${$name} = array_column($rows, $columns[$i-1]);
                            array_push($table_data, ${$name});
                        }
                    
            ?>
            <!-- Main content -->
            <section class="content">                
                <div class="container">
                    <div class="card" style="width:100%; margin:auto">
                    <div class="card-body">
                        <div class="justify-content-center">
                            <div id="table">
                                <script>
                                    var columns = <?php echo '["' . implode('", "', $columns) . '"]' ?>;
                                    var table_data = <?php echo json_encode($table_data); ?>;
                                    var values = table_data

                                    var data = [{
                                    type: 'table',
                                    header: {
                                        values: columns,
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

            <?php 
        }
        ?>
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