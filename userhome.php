<html>
<?php
session_start();
if($_SESSION['loggedIn'] == false) {
	header("location:index.php");
}
?>
	<span id="logo">BUDGETR</span> <span id="zheader">
		<?php echo "You are logged in as ". $_SESSION['user']." ";?><a href="logout
		.php"><button>Logout</button></a>
	</span>
<head>
<style><?php include 'css/main.css'; ?></style>
</head>
<body>
	<div>
		<p><?php include("budget.php"); ?></p>
	</div>
</body>
</html>