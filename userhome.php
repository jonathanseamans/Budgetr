<html>
 <link href="css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
	<div>
		<p><?php include("budget.php"); ?></p>
	</div>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>