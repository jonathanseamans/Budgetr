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
            <li class="active"><a href="category_setup.php">Categories</a></li>
            <li><a href="transaction_1.php">Transactions</a></li>
            <li><a href="edit_title.php">Options</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	<?php
	session_start();
	?>
	<body>
	<br>
	<p>Enter the name of your Category: <input type="text" name="Category Title" value="" id="ctitle"></p>
	<br>
	<p>Enter the amount in this Category per budget period <input type="number" name="Category Title" value=""
																  id="cvalue"></p>
	<br>
	<button onclick="cat_submit()">Save</button>
	<div id='catresponse'/>
	</body>
</html>
<script>
	function cat_submit()
	{
		var ctitle = document.getElementById("ctitle").value;
		var cvalue = document.getElementById("cvalue").value;
		var xhr;
		if (window.XMLHttpRequest) { // Mozilla, Safari, ...
			xhr = new XMLHttpRequest();
		} else if (window.ActiveXObject) { // IE 8 and older
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}
		var data = "ctitle=" + ctitle + "&cvalue=" + cvalue;
		xhr.open("POST", "category_setup2.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(data);
		xhr.onreadystatechange = display_data;
		function display_data() {
			if (xhr.readyState == 4) {
				if (xhr.status == 200) {
					document.getElementById("catresponse").innerHTML = xhr.responseText;
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