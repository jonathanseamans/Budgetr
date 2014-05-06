<?php 
	session_start();
	if($_SESSION['loggedIn'] == false) {
		header("location:index.php");
	}
	$title = $_POST['ti'];  
	$bid = $_POST['bi']; 
	$timestamp = $_POST['timestamp'];
	$newudv = $_POST['udv'];
	$newtrans = $_POST['trans'];  
	$newnotes = $_POST['notes'];  
	$uuid = $_SESSION['userid'];

	include 'mysql.php';

	$result = mysql_query("SELECT UDV, trans FROM budget WHERE uid = $uuid AND UDT = '$title' AND type=3 AND bid = $bid");
	$row = mysql_fetch_array($result);
	$value = $row['UDV'];
	if($row['trans'] == 'Deposit') {
		$result = mysql_query("SELECT CUDV FROM budget where uid = $uuid AND UDT = '$title' AND type=1");
		$row = mysql_fetch_array($result);
		$cudv = $row['CUDV'];
		$cudv = $cudv - $value;
		mysql_query("UPDATE budget SET CUDV = $cudv WHERE uid =$uuid AND UDT = '$title' AND type = 1");
	}
	else {
		$result = mysql_query("SELECT CUDV FROM budget where uid = $uuid AND UDT = '$title' AND type=1");
		$row = mysql_fetch_array($result);
		$cudv = $row['CUDV'];
		$cudv = $cudv + $value;

		mysql_query("UPDATE budget SET CUDV = $cudv WHERE uid =$uuid AND UDT = '$title' AND type=1");
	}

	mysql_query("UPDATE budget SET timestamp = '$timestamp', UDV = $newudv, trans = '$newtrans', notes = '$newnotes' WHERE uid = $uuid AND UDT = '$title' AND type=3 AND bid = $bid");

	if($newtrans == 'Deposit') {
		$result = mysql_query("SELECT CUDV FROM budget where uid = $uuid AND UDT = '$title' AND type=1");
		$row = mysql_fetch_array($result);
		$cudv = $row['CUDV'];
		$cudv = $cudv + $newudv;
		mysql_query("UPDATE budget SET CUDV = $cudv WHERE uid =$uuid AND UDT = '$title' AND type=1");
	}
	else {
		$result = mysql_query("SELECT CUDV FROM budget where uid = $uuid AND UDT = '$title' AND type=1");
		$row = mysql_fetch_array($result);
		$cudv = $row['CUDV'];
		$cudv = $cudv - $newudv;
		mysql_query("UPDATE budget SET CUDV = $cudv WHERE uid =$uuid AND UDT = '$title' AND type=1");
	}

	echo "Transaction Saved";
	header("location:viewtrans.php?t=".$title);
?>