<html>
<style>
	color: rgb(255,255,255);
</style>
<?php
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
<p>
	<?php 
		if($exist == true) {
		    	include 'category_display.php';
		    }
		    else {
		    	include 'wizard1.php';
		    }
	?>
</p>
</html>