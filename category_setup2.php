<?php
include 'mysqllocal.php';
session_start();
$ctitle = $_POST['ctitle'];
$cvalue = $_POST['cvalue'];
$uuid = $_SESSION['userid'];
echo $ctitle;
echo $cvalue;
?>