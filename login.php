<!doctype html>
<html lang="en">
<?php
		
	if(isset($_POST['add'])) {
		$errorcount = false;
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		// Validation Begin
		if (empty($user_email))
     		{	
     			$emailErr = "Email is required";
     			$errorcount = true;
     		}
   		else
     		{	$user_email = test_input($user_email);}

     	if (empty($user_password))
     		{	
     			$passwordErr = "Password is required";
     			$errorcount = true;
     		}
   		else
     		{	$user_password = test_input($user_password);}

     	// Validation End
     	if($errorcount == false) {
			
			$dbhost = $_ENV['OPENSHIFT_MYSQL_DB_HOST'] . ':' . $_ENV['OPENSHIFT_MYSQL_DB_PORT'];
			$dbuser = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
			$dbpass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
			$conn = mysql_connect($dbhost, $dbuser, $dbpass);
			mysql_select_db('test_db');
			
			if(! $conn )
			{
			  die('Unable to Connect to Server' . mysql_error());
			}
			///// MySQL Validation 
			$sql    = "SELECT * FROM user WHERE user_email='$user_email' AND user_password ='$user_password'";
			$result = mysql_query($sql, $conn);
			// count rows to make sure its only 1
			$count=mysql_num_rows($result);
			// mysql_close($conn);
			if($count==1){
				session_register("$user_email");
				session_register("$user_password"); 
				header("location:userhome.php");
			}
			else {
				echo "Wrong Username or Password";				
			}
		}
	}

	function test_input($data)
		{
	    	$data = stripslashes($data);
	    	$data = mysql_real_escape_string($data);
	    	return $data;
		}
?>
<style>
body { background: url(resources/unnamed.png) ; 
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
	<body>
	<div> 
		<p> Log In </p>
		<form method="post" action="<?php $_PHP_SELF ?>">
		<table width="400" border="0" cellspacing="1" cellpadding="2">
		<tr>
		<td width="100">Email Address</td>
		<td><input name="user_email" type="text" id="user_email"></td>
		<span class="error">* <?php echo $emailErr;?></span>
		</tr>
		<tr>
		<td width="100">Password</td>
		<td><input name="user_password" type="password" id="user_password"></td>
		<span class="error">* <?php echo $passwordErr;?></span>
		</tr>
		<tr>
		<td width="100"> </td>
		<td>
		<input name="add" type="submit" id="add" value="Login">
		</td>
		</tr>
		</table>
		</form>
	</div>
</body>
</html>