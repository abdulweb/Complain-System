<?php
$servername="127.0.0.1:3306";
$username="root";
$password=""; 

$connect=mysqli_connect($servername, $username,$password);

if (! $connect){
	die("database connection failed".mysqli_connect_error());
}
	$db_select=mysqli_select_db($connect,"complain" );
	if (! $db_select){
	die("Error connecting to database. Contact Administrator". mysqli_connect_error());
	}
?>