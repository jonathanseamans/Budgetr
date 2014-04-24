<html>
<style><?php include 'css/main.css'; ?></style>
<?php
session_start();
$uuid = $_SESSION['userid'];
?>
<body>
<p> Title </p>
<?php 
	include 'mysql.php';
	$sql = mysql_query("SELECT UDT FROM budget WHERE uid = '$uuid' AND type = 2");
	print_r($row['UDT']);
?>
<p>Edit Title: <input type="text" name="notes" value="$row['UDT']" id="notes"></p>									  
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