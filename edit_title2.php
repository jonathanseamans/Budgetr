<?php
include 'mysql.php';
$notes = $_POST['notes'];
$uuid = $_SESSION['userid'];

$sql = "UPDATE budget SET UDT = '$notes' WHERE uid = '$uuid' AND type = 2";
mysql_query($sql) or die(mysql_error());
flush();
echo "Title Saved";
?>
