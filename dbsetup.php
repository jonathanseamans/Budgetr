<html>

<?php
	$dbhost = $_ENV['OPENSHIFT_MYSQL_DB_HOST'] . ':' . $_ENV['OPENSHIFT_MYSQL_DB_PORT'];
	$dbuser = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
	$dbpass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);


	function createTables()
	{
		if(! $conn )
		{
		  die('Could not connect: ' . mysql_error());
		}
		echo 'Connected successfully';
		$sql = 'CREATE TABLE user( '.
		       'user_id INT NOT NULL AUTO_INCREMENT, '.
		       'user_fname VARCHAR(20) NOT NULL, '.
		       'user_lname VARCHAR(20) NOT NULL, '.
		       'user_email VARCHAR(30) NOT NULL, '.
		       'join_date    timestamp(14) NOT NULL, '.
		       'primary key ( user_id ))';

		mysql_select_db('test_db');
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
		  die('Could not create table: ' . mysql_error());
		}
		echo "Table user created successfully\n";
		mysql_close($conn);
	}

	if (isset($_GET['setuptable1'])) {
	    createTables();
	  }

	 ?>
<body>
<a href="mysql.php?setuptable1=true"><button>Setup Tables</button></a>
</body>
</html>