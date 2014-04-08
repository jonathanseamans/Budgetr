<!doctype html>
<html lang="en">
<?php
	// if(isset($_POST['add']))
		// if($user_password2 != $user_password) {
			// echo "Password not the same in both fields";
		// }		
	// 	$dbhost = $_ENV['OPENSHIFT_MYSQL_DB_HOST'] . ':' . $_ENV['OPENSHIFT_MYSQL_DB_PORT'];
	// 	$dbuser = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
	// 	$dbpass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
	// 	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	
	// 	if(! $conn )
	// 	{
	// 	  die('Unable to Connect to Server' . mysql_error());
	// 	}

	// 	$user_email = $_POST['user_email'];
	// 	$user_password = $_POST['user_password'];

	// 	// $sql = "INSERT INTO user ".
	// 	//        "(user_id,user_id,user_email, user_password) ".
	// 	//        "VALUES('NULL','$user_id','$user_email',$user_password)";
	// 	mysql_select_db('test_db');
	// 	$retval = mysql_query( $sql, $conn );
	// 	if(! $retval )
	// 	{
	// 	  die('Could not enter data: ' . mysql_error());
	// 	}
	// 	echo "Entered data successfully\n";
	// 	mysql_close($conn);
	// }
?>
<style>
body { background: url(resources/unnamed.png) ; 
}
#hea1 {
	background-color:white;
}
input
{
  -moz-border-radius: 15px;
 border-radius: 15px;
    border:solid 4px black; 
    padding:5px;
    font-family: sans-serif;
    font-size: 20;
}
div{
background-color: rgba(5,4,2,0.2);
width:850px;
height: 100%;
margin-left:auto;
margin-right:auto;
padding: 15px; }
	</style>
<body>
	<div> 
		<form method="post" action="<?php $_PHP_SELF ?>">
		<table width="400" border="0" cellspacing="1" cellpadding="2">
		<tr>
		<td width="100">Enter your Email Address</td>
		<td><input name="user_email" type="text" id="user_email"></td>
		</tr>
		<tr>
		<td width="100">Enter your Password</td>
		<td><input name="user_password" type="text" id="user_password"></td>
		</tr>
		<tr>
		<td width="100">Confirm your Password</td>
		<td><input name="user_password2" type="text" id="user_password2"></td>
		</tr>
		<tr>
		<td width="100"> </td>
		<td> </td>
		</tr>
		<tr>
		<td width="100"> </td>
		<td>
		<input name="add" type="submit" id="add" value="Register Account">
		</td>
		</tr>
		</table>
		</form>
	</div>
</body>
</html>