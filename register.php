<!doctype html>
<html lang="en">
<?php
	if(isset($_POST['add'])) {

		$errorcount = false;
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_password2 = $_POST['user_password2'];
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

     	if(empty($user_password2))
     	{
     		$password2Err = "Password is required";
     		$errorcount = true;
     	}
     	else
     		{ $user_password2 = test_input($user_password2); }

     	if($user_password2 != $user_password) {
     		$password2Err2 = "Passwords must match";
     		$errorcount = true;
     	}

		// Validation End
     	if($errorcount == false) {

			include 'mysqllocal.php';

			///// MySQL Validation 
			$sql    = "SELECT * FROM user WHERE user_email='$user_email'";
			$retval = mysql_query($sql, $conn);
			
			if(! $retval) {


				$sql = "INSERT INTO user ".
				       "(user_id,user_email, user_password) ".
				       "VALUES('NULL','$user_email','$user_password')";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
				  die('Could not enter data: ' . mysql_error());
				}
				echo "Account Registered successfully\n";
			}
			else {
				echo "Email Address is already in Use";
			}
		}
	}
	function test_input($data)
		{
	    	$data = trim($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
 			return $data;
		}
?>
<style><?php include 'css/main.css'; ?></style>
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