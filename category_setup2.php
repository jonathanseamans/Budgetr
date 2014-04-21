<?php
include 'mysqllocal.php';
session_start();
$ctitle = $_POST['ctitle'];
$uuid = $_SESSION['userid'];
echo $ctitle;
?>