<?php
	$dbhost = $_ENV['OPENSHIFT_MYSQL_DB_HOST'] . ':' . $_ENV['OPENSHIFT_MYSQL_DB_PORT'];
	$dbuser = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
	$dbpass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
	echo 'Connected successfully';
	$sql = 'CREATE Database test_db';
	$retval = mysql_query( $sql, $conn );
	if(! $retval )
	{
	  die('Could not create database: ' . mysql_error());
	}
	echo "Database test_db created successfully\n";
	mysql_close($conn);
?>