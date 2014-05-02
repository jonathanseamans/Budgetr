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
input {
	color:black;
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
            <li class="active"><a href="transaction_1.php">Transactions</a></li>
            <li><a href="edit_title.php">Options</a></li>
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
<br>
<p>Select the name of your category you wish to add a transaction 

<select id="ttitle">
<?php 
	include 'mysql.php';
	$sql = mysql_query("SELECT UDT FROM budget WHERE uid = '$uuid' AND type = 1");
	while ($row = mysql_fetch_array($sql)){
	echo "<option value=\"". $row['UDT'] . "\">" . $row['UDT'] . "</option>";
	}
?>
</select>
<br>
<p>Adding or Subtracting? <select id="math">
		<option value="add">Adding</option>
		<option value="sub">Subtracting</option>
	</select></p>
<p>Enter the amount in this Transaction <input type="number" name="Transaction Title" value=""
															  id="tvalue"></p>
<p>Enter any notes: <input type="text" name="notes" value="" id="notes"></p>															  
<br>
<button onclick="t_submit()">Save</button>
<div id='tresponse'/>
</body>
</html>
<script>
	function t_submit()
	{
		var ttitle = document.getElementById("ttitle").value;
		var tvalue = document.getElementById("tvalue").value;
		var math = document.getElementById("math").value;
		var notes = document.getElementById("notes").value;
		var xhr;
		if (window.XMLHttpRequest) { // Mozilla, Safari, ...
			xhr = new XMLHttpRequest();
		} else if (window.ActiveXObject) { // IE 8 and older
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}
		var data = "ttitle=" + ttitle + "&tvalue=" + tvalue + "&math=" + math + "&notes=" + notes;
		xhr.open("POST", "transaction_2.php", true);
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