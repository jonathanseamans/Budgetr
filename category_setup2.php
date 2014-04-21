<?php
include 'mysql.php';
session_start();
$ctitle = $_POST['ctitle'];
$cvalue = $_POST['cvalue'];
$uuid = $_SESSION['userid'];

$sql = "SELECT bid FROM budget WHERE uid = '$uuid' ORDER BY bid DESC";
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);

$row = mysql_fetch_array($result);

print_r($row);

// $sql = "INSERT INTO budget (uid,bid,type,UDT,UDV) VALUES ('$uuid','$num_rows','1','$ctitle','$cvalue')";
// mysql_query($sql);
flush();
echo "Category Saved";
?>
