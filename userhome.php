<!doctype html>
<html lang="en">
<?php
	session_start();
	if($_SESSION['loggedIn'] == false) {
		header("location:index.php");
	}
?>
<style>
body { background: url(resources/unnamed.png) ; 
}

input
{
  -moz-border-radius: 15px;
 border-radius: 15px;
    border:solid 4px black; 
    padding:5px;
    font-family: sans-serif;
    font-size: 20;
}
div{
background-color: rgba(5,4,2,0.2);
width:850px;
height: 100%;
margin-left:auto;
margin-right:auto;
padding: 15px; }
	</style>
<body>
	<div> 
		<p>Welcome $_SESSION['user']</p>
		<br />
		<br />
	</div>

</body>
</html>