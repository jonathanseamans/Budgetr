<?php
include 'mysql.php';
session_start();
$ttitle = $_POST['ttitle'];
$tvalue = $_POST['tvalue'];
$math = $_POST['math'];
$uuid = $_SESSION['userid'];

$sql = "SELECT bid FROM budget WHERE uid = '$uuid' ORDER BY bid DESC";
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);

$row = mysql_fetch_array($result);

$numbid = $row['bid'] + 1;

$sql = "SELECT CUDV FROM budget WHERE uid = '$uuid' AND UDT = '$ttitle'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
//$sql = "INSERT INTO budget (uid,bid,type,UDT,UDV) VALUES ('$uuid','$num_rows','3','$ctitle','$cvalue')";
//mysql_query($sql);
flush();
echo $row[0];
// echo $ttitle;
// echo $tvalue;
// echo $math;
?>
