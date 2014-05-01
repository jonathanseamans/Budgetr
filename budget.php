<html>
<style>
body {
	padding-top: 50px;
}
</style>
<body>
 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
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
 <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>