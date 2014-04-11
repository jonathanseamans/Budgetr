<html>
<?php
	session_start();
	
	include 'mysql.php';
			
	if(! $conn )
	{
	  die('Unable to Connect to Server' . mysql_error());
	} 
	$sql = "SELECT * FROM budget WHERE uid='$_SESSION['userid']'";
	$result = mysql_query($sql, $conn);
	$count=mysql_num_rows($result);
	for ($i=0; $i<=$count; $i++)
  	{
	  	if(mysql_result($result, $i,'type') == 2) {
	  		$exist = true;
	  		$title = mysql_result($result, $i,'type');
	  		break;
	  	}
	  	else {
	  		$exist = false;
	  	}
    }

    if($exist == true) {
    	echo "Load Title and Rest";
    }
    else {
    	echo "Call Wizard";
    }

	


?>
<style><?php include 'css/main.css'; ?></style>
</html>