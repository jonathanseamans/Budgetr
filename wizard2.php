<?php
//provide your hostname, username and dbname
include 'mysql.php';
$title_name = $_POST['title_name'];
// type 2 == title
$sql = "INSERT INTO budget (uid,bid,type,UDT) VALUES ($_SESSION['userid'],1,2,$title_name)";
mysql_query($sql);
?>
