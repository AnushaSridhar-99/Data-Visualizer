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
if(isset($_GET["tablenamedrop"])){
    // Check if username is empty
    $tablename = trim($_GET["tablenamedrop"]);
    $query = "DROP TABLE `".$tablename."`";
    $res = mysqli_query($conn, $query);
    $query = "DELETE FROM usercsv where TABLENAME = '".$tablename."'";
    $res = mysqli_query($conn, $query);
    echo '<alert>Table deleted successfully</alert>';
}

if(isset($_GET["tablenameplot"])){
    // Check if username is empty
    $tablename = trim($_GET["tablenameplot"]);
    $_SESSION['fileName'] = $tablename;
    header("location: table.php");
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
                                echo '<div class="row mtd-2 justify-content-center">';
                                echo'<div class="col-s-6">';
                                echo '<div class="card mt-3" style="width: 100%">';
                                echo' <div class="card-body d-flex">
                                    <div class="form-group row">';                                                                                                                                                                                                        
                                echo '<label>'.$tablename.'</label>';
                                echo '<button type="button" onclick=plotgraph("'.$tablename.'") class="btn btn-outline-success ml-5">Plot Graph</button><br/>';
                                echo '<button type="button" onclick=deletetable("'.$tablename.'") class="btn btn-outline-danger ml-5">Remove CSV</button><br/>';
                                echo '</div>
                                </div>
                                </div>
                                </div>
                                </div>';
                            }
                        }
                        else
                        {
                            echo "connection failed";
                        }
                        
                        ?>                                                    
                    </div>                                                
                                            
                                        
                           
                </section>
            </div>
        </div>
    </div>  
<script>
function deletetable(tablename){
    if(confirm("Are you sure you want to delete this table?")){
        window.location.href = "userhome.php?tablenamedrop="+tablename;
    }
}  
function plotgraph(tablename){
    window.location.href = "userhome.php?tablenameplot="+tablename;
   
}
</script>
</body>
</html>
<!--Final-->