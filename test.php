<?
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
			$sql = "SELECT * FROM user WHERE user_email='test' AND user_password ='test'";
			$result = mysql_query($sql, $conn);
			// count rows to make sure its only 1
			$count=mysql_num_rows($result);

			if($count==1){
				$user_id = mysql_result($result, 0,'user_id');
				echo $user_id;
			}
			?>