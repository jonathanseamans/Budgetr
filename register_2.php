<?php

include 'mysql.php';

$user_email = $_POST['reg_email'];
$user_password = $_POST['reg_password'];

include 'mysql.php';	
///// MySQL Validation
 
$sql    = "SELECT * FROM user WHERE user_email='$user_email'";
$retval = mysql_query($sql);

				
if(mysql_num_rows($retval) === 0) {
	
	$sql = "INSERT INTO user ".
				"(user_id,user_email, user_password) ".
				"VALUES('NULL','$user_email','$user_password')";
	$retval = mysql_query($sql);
	if(! $retval ) {
		die('Could not enter data: ' . mysql_error());
	}
	echo "Account Registered Successfully, you may now login.";
}
else {
		echo "Email Already in Use, please choose another";
}
?>