<?php
session_start(); # NOTE THE SESSION START
$_SESSION = array(); 
session_unset();
session_destroy();
header("location:index.php");
exit();
?>