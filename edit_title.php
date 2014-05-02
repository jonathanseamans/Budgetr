<html>
<style>
body
{
    background: url(resources/unnamed.png) ;
    color: rgb(255,255,255);
    padding: 50px;
}
p {
	color: rgb(255,255,255);
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
            <li><a href="userhome.php">Home</a></li>
            <li><a href="category_setup.php">Categories</a></li>
            <li><a href="transaction_1.php">Transactions</a></li>
            <li class="active"><a href="edit_title.php">Options</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<?php
session_start();
$uuid = $_SESSION['userid'];
?>
<body>
<h1 id="te2">
<style>
#te2 {
	color:white;
}
input {
	color:black;
}
</style>
<?php 
	include 'mysql.php';
	$result = mysql_query("SELECT UDT FROM budget WHERE uid = $uuid AND type = 2");
	$row = mysql_fetch_row($result);
	$title = $row[0];
	echo $row[0]."<br>";
	?>
	</h1>
<p>Edit Title: <input type="text" name="notes" value="<?= $title ?>" id="notes"></p>									  
<br>
<button onclick="title_submit()">Save</button>
<div id='tresponse'/>
</body>
</html>
<script>
	function title_submit()
	{
		var notes = document.getElementById("notes").value;
		var xhr;
		if (window.XMLHttpRequest) { // Mozilla, Safari, ...
			xhr = new XMLHttpRequest();
		} else if (window.ActiveXObject) { // IE 8 and older
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}
		var data = "notes=" + notes;
		xhr.open("POST", "edit_title2.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(data);
		xhr.onreadystatechange = display_data;
		function display_data() {
			if (xhr.readyState == 4) {
				if (xhr.status == 200) {
					document.getElementById("tresponse").innerHTML = xhr.responseText;
					self.location="userhome.php";
				} else {
					alert('There was a problem with the request.');
				}
			}
		}
	}
</script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>