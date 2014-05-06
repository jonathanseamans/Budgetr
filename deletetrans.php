<?php 
	session_start();
	if($_SESSION['loggedIn'] == false) {
		header("location:index.php");
	}
	$title = $_GET['t'];
	$bid = $_GET['b'];
	$uuid = $_SESSION['userid'];

	include 'mysql.php';
	mysql_query("DELETE FROM budget WHERE uid = $uuid AND UDT = '$title' AND type=3 AND bid = $bid LIMIT 1");
	header("location:viewtrans.php?t=".$title);
?>