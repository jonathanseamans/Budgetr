<?php
include 'mysqllocal.php';
session_start();
$title_name = $_POST['title_name'];
$uuid = $_SESSION['userid'];
echo "Title Saved";
?>
