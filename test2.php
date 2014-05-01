<?php
include 'mysql.php';
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$query2=mysql_query("SELECT * FROM user");
	$res = mysql_num_rows($query2);
	echo $res;
	if($query2)
	{
	echo "<h2>Your Registration Process succesfully completed. Thank You</h2>";
	}
}
?>