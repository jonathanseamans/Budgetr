<html>
<style>
body
{
    background: url(resources/unnamed.png) ;
    color: rgb(255,255,255);
    padding: 50px;
}
</style>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="userhome.php">BUDGETR</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="userhome.php">Home</a></li>
            <li><a href="category_setup.php">Categories</a></li>
            <li><a href="transaction_1.php">Transactions</a></li>
            <li><a href="logout.php">Logout</a></li>
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