<html>

<?php
session_start();
$uuid = $_SESSION['userid'];
?>
<body>
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
		var xhr;
		if (window.XMLHttpRequest) { // Mozilla, Safari, ...
			xhr = new XMLHttpRequest();
		} else if (window.ActiveXObject) { // IE 8 and older
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}
		var data = "ttitle=" + ttitle + "&tvalue=" + tvalue + "&math=" + math;
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