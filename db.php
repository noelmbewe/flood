<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "floodmanagement";

// Create connection

$conn =  mysqli_connect($servername,$username,$password,"$dbname");

if (!$conn) {
	
	die("Could Not Connect:" .mysqli_connect_error());
}




?>