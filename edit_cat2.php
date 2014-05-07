<?php 
	session_start();
	if($_SESSION['loggedIn'] == false) {
		header("location:index.php");
	}
	$oldtitle = $_POST['ti'];  
	$title = $_POST['title2'];  
	$udv = $_POST['udv'];
	$uuid = $_SESSION['userid'];

	include 'mysql.php';
	mysql_query("UPDATE budget SET UDT = '$title' WHERE uid = $uuid AND UDT = '$oldtitle' AND type = 3 ");
	mysql_query("UPDATE budget SET UDT = '$title', UDV = $udv WHERE uid = $uuid AND UDT = '$oldtitle' AND type = 1");
	echo "Category Saved";
	header("location:viewtrans.php?t=".$title);
	?>