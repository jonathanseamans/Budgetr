<?php
	
			// Validation End
	     
	
				include 'mysql.php';
	
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
	?>