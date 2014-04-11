<html>
<?php
	session_start();
	echo "file loaded successfully";
	include 'mysql.php';
			
	$sql = "SELECT * FROM budget WHERE uid='$_SESSION['userid']'";
	$result = mysql_query($sql, $conn);
	$count=mysql_num_rows($result);
?>
<br />
<p>
<?php 
	echo "test 2";
	echo $count;
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

    // if($exist == true) {
    // 	echo "Load Title and Rest";
    // }
    // else {
    // 	echo "Call Wizard";
    // }
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
		    	echo "Call Wizard";
		    }
	?>
</p>
</html>