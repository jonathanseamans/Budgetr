<?php 
	session_start();
	if($_SESSION['loggedIn'] == false) {
		header("location:index.php");
	}
	$title = $_GET['t'];
	$bid = $_GET['b'];
	$uuid = $_SESSION['userid'];

	include 'mysql.php';
	$result = mysql_query("SELECT UDV, trans FROM budget WHERE uid = $uuid AND UDT = '$title' AND type=3 AND bid = $bid LIMIT 1");
	$row = mysql_fetch_array($result);
	$value = $row['UDV'];
	if($row['trans'] == 'Deposit') {
		$result = mysql_query("SELECT CUDV FROM budget where uid = $uuid AND UDT = '$title' AND type=1 LIMIT 1");
		$row = mysql_fetch_array($result);
		$cudv = $row['CUDV'];
		$cudv = $cudv - $value;
		mysql_query("UPDATE budget SET CUDV = $cudv WHERE uid =$uuid AND UDT = '$title' AND type=1");
	}
	else {
		$result = mysql_query("SELECT CUDV FROM budget where uid = $uuid AND UDT = '$title' AND type=1 LIMIT 1");
		$row = mysql_fetch_array($result);
		$cudv = $row['CUDV'];
		$cudv = $cudv + $value;
		mysql_query("UPDATE budget SET CUDV = $cudv WHERE uid =$uuid AND UDT = '$title' AND type=1");
	}
 
  	
	mysql_query("DELETE FROM budget WHERE uid = $uuid AND UDT = '$title' AND type=3 AND bid = $bid LIMIT 1");
	header("location:viewtrans.php?t=".$title);
?>