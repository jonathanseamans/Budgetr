<!doctype html>
<html lang="en">
<?php
	session_start();
	if($_SESSION['loggedIn'] == false) {
		header("location:index.php");
	}
?>
<style><?php include 'css/main.css'; ?></style>
<head>
	<a href="logout.php"><button>Logout</button></a>
</head>	
<body>
	<div> 
		<p><?php echo "Welcome ". $_SESSION['user'];?></p>
		<br />
		<p><?php include("budget.php"); ?></p>
	</div>
</body>
</html>