<html>
<body>
<p>Enter the name of your budget: <input type="text" name="Budget Title" value="" id="title"></p>
<br>
<p> Set the starting date for your budget
<?php
	include 'calendar.php';
	echo date_picker("calendar"); 
?>
</p>
<br>
<p>Select your budget period <select name="periodlength">
<option value="2week">Every 2 Weeks</option>
<option value="bimonthly">Bi-Monthly</option>
<option value="monthly">Monthly</option>
</select></p>
<br>
<br>
<button onclick="title_submit()">Save</button>
<div id='titleresponse'/>
</body>
</html>
<script>
	function title_submit()
	{
		var title = document.getElementById("title").value;
		var xhr;
		if (window.XMLHttpRequest) { // Mozilla, Safari, ...
			xhr = new XMLHttpRequest();
		} else if (window.ActiveXObject) { // IE 8 and older
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}
		var data = "title_name=" + title;
		xhr.open("POST", "wizard2.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(data);
		xhr.onreadystatechange = display_data;
		function display_data() {
			if (xhr.readyState == 4) {
				if (xhr.status == 200) {
					document.getElementById("titleresponse").innerHTML = xhr.responseText;
					location.reload();
				} else {
					alert('There was a problem with the request.');
				}
			}
		}
	}
</script>