<?php
include 'mysql.php';
session_start();
$ttitle = $_POST['ttitle'];
$tvalue = $_POST['tvalue'];
$math = $_POST['math'];
$notes = $_POST['notes'];
$uuid = $_SESSION['userid'];

$sql = "SELECT bid FROM budget WHERE uid = '$uuid' AND UDT = '$ttitle' ORDER BY bid DESC";
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);

$row = mysql_fetch_array($result);

$numbid = $row['bid'] + 1;

$sql = "SELECT CUDV FROM budget WHERE uid = '$uuid' AND UDT = '$ttitle'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$currval = $row['CUDV'];

if ($math == "add") {
	$currval = $currval + $tvalue;
}
else {
	$currval = $currval - $tvalue;
}
$sql = "INSERT INTO budget (uid,bid,type,UDT,UDV,CUDV,notes) VALUES ('$uuid','$num_rows','3','$ttitle','$tvalue','$currval','$notes')";
mysql_query($sql) or die(mysql_error());
$sql = "UPDATE budget SET CUDV = '$currval' WHERE uid = '$uuid' AND type = 1 AND UDT = '$ttitle'";
mysql_query($sql) or die(mysql_error());
flush();
echo "Transaction Saved";
?>
