<?php
	session_start();
	if($_SESSION['loggedIn'] == true) {
		header("location:userhome.php");
	}	
	if(isset($_POST['add'])) {
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
			
			include 'mysql.php';
			
			///// MySQL Validation 
			$sql = "SELECT * FROM user WHERE user_email='$user_email' AND user_password ='$user_password'";
			$result = mysql_query($sql, $conn);
			// count rows to make sure its only 1
			$count=mysql_num_rows($result);

			if($count==1){
				$user_id = mysql_result($result, 0,'user_id');
				session_start();
				$_SESSION['loggedIn'] = true; 
   				$_SESSION['user'] = $user_email;
    			$_SESSION['pass'] = $user_password;
    			$_SESSION['userid'] = $user_id;  
				header("location:userhome.php");
			}
			else {
				echo "Wrong Username or Password";				
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

<!doctype html>
<html lang="en">
<style><?php include 'css/main.css'; ?></style>
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