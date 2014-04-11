<?php
	$dbhost = $_ENV['OPENSHIFT_MYSQL_DB_HOST'] . ':' . $_ENV['OPENSHIFT_MYSQL_DB_PORT'];
	$dbuser = $_ENV['OPENSHIFT_MYSQL_DB_USERNAME'];
	$dbpass = $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD'];
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db('test_db');
			
	if(! $conn )
	{
	  die('Unable to Connect to Server' . mysql_error());
	} 