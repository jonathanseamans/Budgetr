<?php
include 'mysql.php';
$title_name = $_POST['title_name'];
$uuid = $_SESSION['userid'];
// type 2 == title
$sql = "INSERT INTO budget (uid,bid,type,UDT) VALUES ('$uuid','1','2','$title_name')";
mysql_query($sql);
echo "title changed!";
?>
