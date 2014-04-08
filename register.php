<!doctype html>
<html lang="en">
<?php
	if(isset($_POST['add'])) {

		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_password2 = $_POST['user_password2'];

		if (empty($user_email))
     		{	$emailErr = "Email is required";}
   		else
     		{	$user_email = test_input($user_email);}

     	if (empty($user_password))
     		{	$passwordErr = "Password is required";}
   		else
     		{	
     			if (empty($user_password2))
     				{	$password2Err = "Password is required";}
   				else
     				{	
     					if ($user_password != $user_password2))
     						{	$paswordErr2 = "Passwords must match";}
   						else
     						{	$user_password = test_input($user_password);}
     				}
     		}
	
     
			
		$dbhost = $_ENV['OPENSHIFT_MYSQL_DB_HOST'] . ':' . $_ENV['OPENSHIFT_MYSQL_DB_PORT'];
		$dbuser = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
		$dbpass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	
		if(! $conn )
		{
		  die('Unable to Connect to Server' . mysql_error());
		}

		$sql = "INSERT INTO user ".
		       "(user_id,user_email, user_password) ".
		       "VALUES('NULL','$user_email','$user_password')";
		mysql_select_db('test_db');
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
		  die('Could not enter data: ' . mysql_error());
		}
		echo "Account Registered successfully\n";
		mysql_close($conn);
	}
	function test_input($data)
	{
     	$data = trim($data);
    	 $data = stripslashes($data);
    	 $data = htmlspecialchars($data);
    	 return $data;
	}
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
		<span class="error">* <?php echo $emailErr;?></span>
		</tr>
		<tr>
		<td width="100">Enter your Password</td>
		<td><input name="user_password" type="password" id="user_password"></td>
		<span class="error">* <?php echo $passwordErr;?></span>
		</tr>
		<tr>
		<td width="100">Confirm your Password</td>
		<td><input name="user_password2" type="password" id="user_password2"></td>
		<span class="error">* <?php echo $password2Err;?></span>
		<span class="error">* <?php echo $password2Err2;?></span>
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