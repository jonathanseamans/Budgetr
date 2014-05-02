	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<style>
		#content {
			background-color: rgba(2,2,2,.5);
			color: rgb(255,255,255);
		}
		#tabs {
			background-color: rgba(2,2,2,.5);
			color: rgb(255,255,255);
		}
		.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
 		 background-color: rgb(50,0,0);
		}
		body
		{
		    background: url(resources/unnamed.png) ;
		    color: rgb(255,255,255);
		    padding: 50px;
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
if($_SESSION['loggedIn'] == false) {
	header("location:index.php");
}
?>
<head>
</head>
<body>
<div id="content">
	<?php
	$title = $_GET['t'];
	include 'mysql.php';
	$uuid = $_SESSION['userid'];

	echo '<center> <B> <font size="5">'."Transactions for ".$title;

	$result = mysql_query("SELECT * FROM budget WHERE uid = $uuid AND UDT = '$title' AND type=3");
	?>

	<table class="table table-hover" id="tabs" width="400">
	<tr>
	<th>&nbsp;Date&nbsp;</th>
	<th>&nbsp;Amount&nbsp;</th>
	<th>&nbsp;Notes&nbsp;</th>

	<?php
	while($row = mysql_fetch_array($result))
  	{
		  echo "<tr>";
		  echo "<td>&nbsp;" . $row['timestamp'] . "&nbsp;</td>";
		  echo "<td>&nbsp;" . "$" . $row['UDV'] . "&nbsp;</td>";
		echo "<td>&nbsp;" . $row['notes'] . "&nbsp;</td>";
		  echo "</tr>";
 	 }
	echo "</table>";

	?>
</div>
<style>
#confirm-delete {
	color: black;
}
</style>
<a class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete">Delete Category</a>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Delete <?php echo $title; ?>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this category?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
	$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
	});
</script>