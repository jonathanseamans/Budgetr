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
		// Validation Begin
		
   		$user_email = test_input($user_email);

     	$user_password = test_input($user_password);

     	// Validation End
			
		include 'mysql.php';
		
		///// MySQL Validation 
		$sql = "SELECT * FROM user WHERE user_email='$user_email' AND user_password ='$user_password'";
		$result = mysql_query($sql, $conn);
		// count rows to make sure its only 1
		$count=mysql_num_rows($result);

		if($count==1){
			$user_id = mysql_result($result, 0,'user_id');
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

	function test_input($data)
		{
	    	$data = trim($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
 			return $data;
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
            <li><a href="#signup" data-toggle="modal" data-target=".zs-modal-sm">Registration</a></li>
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
					<h1>Make your landing page<br/>
					look really good.</h1>
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
				<h1>Your Landing Page<br/>Looks Wonderful Now.</h1>
				<h3>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h3>
			</div>
		</div><!-- /row -->
		
		<div class="row mt centered">
			<div class="col-lg-4">
				<img src="assets/img/ser01.png" width="180" alt="">
				<h4>1 - Browser Compatibility</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<img src="assets/img/ser02.png" width="180" alt="">
				<h4>2 - Email Campaigns</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>

			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<img src="assets/img/ser03.png" width="180" alt="">
				<h4>3 - Gather Your Notes</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>

			</div><!--/col-lg-4 -->
		</div><!-- /row -->
	</div><!-- /container -->
	
	<div class="container">
		<div class="row mt centered">
			<div class="col-lg-6 col-lg-offset-3">
				<h1>Budgetr is for Everyone.</h1>
				<h3>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h3>
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
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" class="form-signin" role="form" action="<?php $_PHP_SELF ?>">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="user_email" type="text" class="form-control" id="user_email" placeholder="Email address" required autofocus>
        <input name="user_password" type="password" class="form-control" id="user_password" placeholder="Password" required>
       
        <button name="add" class="btn btn-lg btn-primary btn-block" id="add" type="submit">Sign in</button>
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
<div class="modal fade zs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" class="form-reg" role="form" action="<?php $_PHP_SELF ?>">
        <h2 class="form-reg-heading">Registration is fast and easy</h2>
        <input name="reg_email" type="text" class="form-control" id="reg_email" placeholder="Email address" required autofocus>
        <input name="reg_password" type="password" class="form-control" id="reg_password" placeholder="Password" required>
        <input name="reg_password2" type="password" class="form-control" id="reg_password2" placeholder="Password" required>
       
        <button name="add" class="btn btn-lg btn-primary btn-block" id="add" type="submit">Submit</button>
      </form>
         <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>  
      </div>
    </div>
      </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
