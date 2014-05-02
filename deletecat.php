<?php 
	session_start();
	if($_SESSION['loggedIn'] == false) {
		header("location:index.php");
	}
	$title = $_GET['t'];
	$uuid = $_SESSION['userid'];

	include 'mysql.php';
	mysql_query("DELETE FROM budget WHERE uid = $uuid AND UDT = '$title' AND type=3");
	mysql_query("DELETE FROM budget WHERE uid = $uuid AND UDT = '$title' AND type=1 LIMIT 1");
	header("location:userhome.php");
?>