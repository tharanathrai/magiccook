<?php
	
	$dbserver = "localhost";
	$dbuser = "root";
	$dbpwd = "";
	$dbname = "magiccooknew";
	
	$conn = mysqli_connect($dbserver,$dbuser,$dbpwd,$dbname);
	
	$_SESSION['connection'] = $conn;
?>