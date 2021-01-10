<!DOCTYPE html>
<html lang="en">
<?php
  include 'header.php';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Visualizer Dashboard</title> 
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
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content"> 
      <div class="card" style="width: 56%; margin: auto;">
        <div class="card-body">
      <form method="post" enctype="multipart/form-data">
        <table style="margin: auto;" cellpadding="10px">
          <tr>
            <td style="text-align: right; width: 200px;"><label for="csvFile">Upload csv file: </label></td>
            <td><input type="file" accept=".csv" name="csvFile" id="csvFile"></td>
          </tr>
          <tr>
            <td colspan="2"><button class="btn btn-primary" type="submit" name="submit">Upload</button></td>
          </tr>
        </table>
      </form>
      <?php
      if ( isset($_POST["submit"]) ) {
      ?>
      <table style="margin: auto;" cellpadding="10px">
      <tr>
        <td colspan="2">
        <?php 
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "datavisualizer";

        $conn = mysqli_connect($host, $user, $password);   
        $db = mysqli_select_db($conn, $database);
        $username = $_SESSION["username"];
        echo $username;
      
      if ( isset($_FILES["csvFile"])) 
      {
          //if there was an error uploading the file
          if ($_FILES["csvFile"]["error"] > 0) 
          {
              echo "Return Code: " . $_FILES["csvFile"]["error"] . "<br />";

          }
          else 
          {
                  //Print file details
              echo "Type: " . $_FILES["csvFile"]["type"] . "<br />";
              echo "Size: " . ($_FILES["csvFile"]["size"] / 1024) . " Kb<br />";
                  //if file already exists
              if (file_exists("upload/" . $_FILES["csvFile"]["name"])) {
              echo $_FILES["csvFile"]["name"] . " already exists. ";
              }
              else {
                      //Store file in directory "upload" with the name of "uploaded_file.txt"
              $storagename = $_FILES["csvFile"]["name"];
              move_uploaded_file($_FILES["csvFile"]["tmp_name"], "upload/" . $storagename);
              echo "Stored in: " . "upload/" . $_FILES["csvFile"]["name"] . "<br />";
              }
              $execpath =  str_replace("\\","\\\\\\\\", dirname(__FILE__)) . "\\\\\\\InsertCSV.py";                    
              $retval =  exec("python " .$execpath. " " .$_FILES["csvFile"]["name"]);
              echo $retval;
              $_SESSION['fileName'] = $retval;
              if ($retval === 2) 
              {   
                echo "<br/> Inserting to DB Failed";
                                  
              }
              elseif ($retval === 0)
              {
                echo "<br/> Connection to DB failed";
              }
              else
              {
                echo $retval;
                $_SESSION['fileName'] = $retval;
                $database_table = $retval;
                echo "<br/> Inserted to DB successfully";                      
                // echo "<table class =\"table table-bordered table-striped\">\n\n";
                // $f = fopen("upload/".$_FILES["csvFile"]["name"], "r");
                // while (($line = fgetcsv($f)) !== false) {
                //         echo "<tr>";
                //         foreach ($line as $cell) {
                //                 echo "<td>" . htmlspecialchars($cell) . "</td>";
                //         }
                //         echo "</tr>\n";

              // }
                // fclose($f);
                // echo "\n</table>";
                //echo '<button class="btn btn-primary" type="button" name="choosePlot" onclick="location.href=\'cardselect.php\'">Choose Plots</button>';
                if ($conn && $db)
                {
                  $query = "SELECT id FROM users where username = '".$username."'";
                  $res = mysqli_query($conn, $query);
                  $row = mysqli_fetch_array($res);
                  $userid = $row[0];
                  // echo $userid;
                  $link_query = mysqli_query($conn, "INSERT INTO usercsv (id,tablename) VALUES (".$userid.", '".$retval."')");
                  $res = mysqli_query($conn, $link_query);
                  $col_name_query = mysqli_query($conn, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'datavisualizer' AND TABLE_NAME = '".$retval."'");
                  $result = $col_name_query->fetch_all(MYSQLI_ASSOC);

                  // Array of all column names
                  $columns = array_column($result, 'COLUMN_NAME');
                  // echo "Inserted to usercsv successfully";       
                  $query = "SELECT * FROM `".$retval."`";
                  $res = mysqli_query($conn, $query);
                  $rows = $res->fetch_all(MYSQLI_ASSOC);
                  
                  $table_data = array();
                  for ($i=1; $i < count($columns)+1; $i++) 
                  { 
                      $name = "column".$i;
                      ${$name} = array_column($rows, $columns[$i-1]);
                      array_push($table_data, ${$name});
                }                
                  echo '
                  <script>
                      var columns = ["' .implode('", "', $columns) . '"];
                      var table_data = '.json_encode($table_data).'; 
                      var values = table_data;

                      var data = [{
                      type: \'table\',
                      header: {
                          values: columns,
                          align: "center",
                          line: {width: 1, color: "black"},
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
                  </script>';                    
                     
                }
                else
                {
                  echo "connection failed";
                }
                
                ?>
                <div id="table"></div>

                <div style="text-align: center;">
                <form method="post" action="table.php">
                  <input type="hidden" name="fileName" value="<?=$retval;?>"/>
                  <button class="btn btn-primary" type="submit" name="submit">Choose Plot</button>
              </form>
            </div>
                <?php                            
              }
              
          }
      } 
      else 
      {
        echo "No file selected <br />";
      }
    ?>
                
            </td>
          </tr>   
          </table>       
        <?php
        }
        ?>
            
       
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

</body>
</html>
