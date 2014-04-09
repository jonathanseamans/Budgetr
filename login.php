<!doctype html>
<html lang="en">
<style>
body { background: url(resources/unnamed.png) ; 
}
#hea1 {
	background-color:white;
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
	<body>
	<div> 
		<p> Log In </p>
		<form method="post" action="<?php $_PHP_SELF ?>">
		<table width="400" border="0" cellspacing="1" cellpadding="2">
		<tr>
		<td width="100">Email Address</td>
		<td><input name="user_email" type="text" id="user_email"></td>
		<span class="error">* <?php echo $emailErr;?></span>
		</tr>
		<tr>
		<td width="100">Password</td>
		<td><input name="user_password" type="password" id="user_password"></td>
		<span class="error">* <?php echo $passwordErr;?></span>
		</tr>
		</table>
		</form>
	</div>
</body>
</html>