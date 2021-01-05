<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
// Initialize the session
// Check if the user is already logged in, if yes then redirect him to welcome page
/*if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;*/

 
// Include config file
require_once "config.php";

$host = "localhost";
$user = "root";
$password = "";
$database = "datavisualizer";

$conn = mysqli_connect($host, $user, $password);   
$db = mysqli_select_db($conn, $database);
$username = trim($_SESSION["username"]);
 
// Processing form data when form is submitted
if(isset($_GET["tablename"])){
    // Check if username is empty
    $tablename = trim($_GET["tablename"]);
    $query = "DROP TABLE `".$tablename."`";
    $res = mysqli_query($conn, $query);
    $query = "DELETE FROM usercsv where TABLENAME = '".$tablename."'";
    $res = mysqli_query($conn, $query);
    echo '<alert>Table deleted successfully</alert>';
}
?>
<?php
  include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
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
        <div class="content-wrapper">
            <div class="container-fluid">
                <section class="content"> 
                        <div  class="col d-flex justify-content-center">
                            <div class="card" style="width: 25%">
                                <div class="card-body align-items-center d-flex justify-content-center">
                                    <div class="form-group row">
                                        <div class="col-xs-4">
                                            
                                                <div class="form-group text-center">
                                                    <?php
                                                    $host = "localhost";
                                                    $user = "root";
                                                    $password = "";
                                                    $database = "datavisualizer";

                                                    $conn = mysqli_connect($host, $user, $password);   
                                                    $db = mysqli_select_db($conn, $database);
                                                   
                                                    
                                                    if ($conn && $db)
                                                    {
                                                        $query = "SELECT id FROM users where username =  '".$username."'";
                                                        $res = mysqli_query($conn, $query);
                                                        $rows = $res->fetch_all(MYSQLI_ASSOC);
                                                        $row = $rows[0];
                                                        $userid = $row['id'];
                                                        $query = "SELECT tablename FROM usercsv where id = ".$userid;
                                                        $res = mysqli_query($conn, $query);
                                                        $rows = $res->fetch_all(MYSQLI_ASSOC);
                                                        for ($i=0; $i < count($rows); $i++) { 
                                                            $row = $rows[$i];
                                                            $tablename = $row['tablename'];                                                                                                                        
                                                            echo "<label>".$tablename."</label>";
                                                            echo '<button type="button" onclick=deletetable("'.$tablename.'") class="btn btn-default">Remove Table</button><br/>';
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "connection failed";
                                                    }
                                                    
                                                    ?>                                                    
                                                </div>                                                
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>  
<script>
function deletetable(tablename){
    // alert(username);
    window.location.href = "userhome.php?tablename="+tablename;

}  
</script>
</body>
</html>
<!--Final-->