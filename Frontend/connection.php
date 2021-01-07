<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "datavisualizer";

	$conn = mysqli_connect($host, $user, $password);   
	$db = mysqli_select_db($conn, $database);

?>