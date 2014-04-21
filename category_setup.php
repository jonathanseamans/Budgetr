<html>
<style><?php include 'css/main.css'; ?></style>
	<?php
	session_start();
	?>
	<body>
	<p>Enter the name of your Category: <input type="text" name="Category Title" value="" id="ctitle"></p>
	<br>
	<p>Enter the amount in this Category per budget period <input type="text" name="Category Title" value="" id="cvalue"></p>
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