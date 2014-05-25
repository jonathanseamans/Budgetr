<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	if($_SESSION['loggedIn'] == true) {
		header("location:userhome.php");
	}	

	if(isset($_POST['add'])) {
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
	
		include 'mysql2.php';
		
		///// MySQL Validation 
		if ($stmt = mysqli_prepare($con,"SELECT * FROM user WHERE user_email=? AND user_password=?")) {

		 mysqli_stmt_bind_param($stmt, "ss", $user_email, $user_password);

		 mysqli_stmt_execute($stmt);
 		 $result = $stmt->get_result();
		// // count rows to make sure its only 1
		 $count = mysqli_num_rows($result);
		}

		if($count==1){
			$user_id = $result->fetch_assoc()['user_id'];
			session_start();
			$_SESSION['loggedIn'] = true; 
				$_SESSION['user'] = $user_email;
			$_SESSION['pass'] = $user_password;
			$_SESSION['userid'] = $user_id;  
			header("location:userhome.php");
		}
		else {
			echo "Wrong Username or Password";				
		}
	}
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Budgetr</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><b>Budgetr</b></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="register.php" data-toggle="modal" data-target="#myModal">Registration</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#Login" data-toggle="modal" data-target=".bs-modal-sm">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1>The simple<br/>
					budgeting app.</h1>
					<form class="form-inline" role="form">
					  <div class="form-group">
					    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email address">
					  </div>
					  <button type="submit" class="btn btn-warning btn-lg">Invite Me!</button>
					</form>					
				</div><!-- /col-lg-6 -->
				<div class="col-lg-6">
					<img class="img-responsive" src="assets/img/budgetr.png" alt="">
				</div><!-- /col-lg-6 -->
				
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->
	
	
	<div class="container">
		<div class="row mt centered">
			<div class="col-lg-6 col-lg-offset-3">
				<h1>Simplify your finances.</h1>
				<h3>No uncompromising rules to memorize.  No convoluted systems to figure out.  Budgetr's flexibility means you can make your budget as simple or complex as you want.</h3>
			</div>
		</div><!-- /row -->
		
		<div class="row mt centered">
			<div class="col-lg-4">
				<img src="assets/img/budget_cr.png" width="180" alt="">
				<h4>1 - Define Your Categories</h4>
				<p>Whether you want to create categories based around your bank accounts or your spending habits, Budgetr gives you complete control of your budget's layout.</p>
			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<img src="assets/img/transaction_cr.png" width="180" alt="">
				<h4>2 - Tag Your Transactions</h4>
				<p>Searchable notes allow you to make tracking your transactions as simple or granular as you need.  Create tags based on stores, payment methods, purchase types, etc.  Your options are limitless.</p>

			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<img src="assets/img/ser03.png" width="180" alt="">
				<h4>3 - Achieve Budgeting Accuracy And Awareness</h4>
				<p>The problem with budgeting solutions that promise to automatically update individual account information is that no system is able to categorize your purchases, withdrawals, etc. with 100% accuracy.  Plus, relying on your budgeting software to automatically pull this information makes it easy to pay less attention to your finances, which can lead to greater debt.</p>

			</div><!--/col-lg-4 -->
		</div><!-- /row -->
	</div><!-- /container -->
	
	<div class="container">
		<div class="row mt centered">
			<div class="col-lg-6 col-lg-offset-3">
				<h1>Platform agnostic.<br/>
				Budgetr is there when you need it.</h1>
				<h3>Whether you use a Mac or PC, iPhone or Android (or switch among them frequently), Budgetr is accessible from any device that has an internet connection.</h3>
			</div>
		</div><!-- /row -->
	
		<! -- CAROUSEL -->
		<div class="row mt centered">
			<div class="col-lg-6 col-lg-offset-3">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>
				
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				    <div class="item active">
				      <img src="assets/img/p01.png" alt="">
				    </div>
				    <div class="item">
				      <img src="assets/img/p02.png" alt="">
				    </div>
				    <div class="item">
				      <img src="assets/img/p03.png" alt="">
				    </div>
				  </div>
				</div>			
			</div><!-- /col-lg-8 -->
		</div><!-- /row -->
	</div><! --/container -->


	<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" class="form-signin" role="form" action="<?php $_PHP_SELF ?>">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="user_email" type="text" class="form-control" id="user_email" placeholder="Email address" required autofocus>
        <input name="user_password" type="password" class="form-control" id="user_password" placeholder="Password" required>
       
        <button name="add" class="btn btn-default btn-primary" id="add" style="text-align:center" type="submit">Sign in</button>
      </form>
         <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>  
      </div>
    </div>
      </div>

      <!-- Modal 2 -->
 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<!-- Modal content comes from the page in the href -->
<div class="modal-dialog">
    <div class="modal-content">

    </div>         <!-- /modal-content -->
</div>     <!-- /modal-dialog -->

</div><!-- /.modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
		window.scrollTo(0,0);
	</script>
  </body>
</html>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-20349766-6', 'getbudgetr.com');
  ga('send', 'pageview');

</script>
