	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
<style>
	body
		{
		    background: url(resources/unnamed.png) ;
		    color: rgb(255,255,255);
		    padding: 50px;
		}
		#editable {
			color:black;
		}
</style>
<html>
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
            <li><a href="userhome.php">Home</a></li>
            <li><a href="category_setup.php">Categories</a></li>
            <li><a href="transaction_1.php">Transactions</a></li>
            <li><a href="edit_title.php">Options</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<?php
session_start();
$uuid = $_SESSION['userid'];
if($_SESSION['loggedIn'] == false) {
	header("location:index.php");
}
$title = $_GET['t'];
?>
<body>
<?php 
	include 'mysql.php';

	echo '<center> <B> <font size="5">'."Edit ".$title." Category";

	$result = mysql_query("SELECT * FROM budget WHERE uid = $uuid AND UDT = '$title' AND type=1");
	?>

	<table id="cats2" width="400">
	<tr>
	<th>&nbsp;Name&nbsp;</th>
	<th>&nbsp;Budgeted Amount&nbsp;</th>

	<?php
	while($row = mysql_fetch_array($result))
  	{

  		  echo "<form method='POST' action='edit_cat2.php'>";
		  echo "<tr id='editable'>";
		  echo "<td width='150'><input name='title2' value='".$row['UDT']."'></input></td>";
		  echo "<td width='150'><input name='udv' value='". $row['UDV'] . "'></input></td>";
		  echo "</tr>";
 	 }
	echo "</table>";

	?>
	<input type="hidden" id="title" name="ti" value="<?php echo $title; ?>">
	<br>
	<button type="submit" class="btn btn-success">Save Category</button>
</form>
</body>
</html>