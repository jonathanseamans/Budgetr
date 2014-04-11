<html>
<?php
	session_start();
	echo "file loaded successfully";
	include 'mysql.php';
	$var = $_SESSION['userid'];		
	$sql = "SELECT * FROM budget WHERE uid='$var'";
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
?>
</p>
<br />
<style><?php include 'css/main.css'; ?></style>
<p>
	<?php 
		if($exist == true) {
		    	echo "Load Title and Rest";
		    }
		    else {
		    	include 'wizard1.php';
		    }
	?>
</p>
</html>