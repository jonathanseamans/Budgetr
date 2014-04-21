<?php
include 'mysql.php';
session_start();
$ctitle = $_POST['ctitle'];
$cvalue = $_POST['cvalue'];
$uuid = $_SESSION['userid'];

$sql = "SELECT bid FROM budget WHERE uid = '$uuid'";
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);
$num_rows = $num_rows + 1;


$sql = "INSERT INTO budget (uid,bid,type,UDT,UDV) VALUES ('$uuid','$num_rows','1','$ctitle','$cvalue')";
mysql_query($sql);
flush();
echo "Category Saved";
?>
