<html>
<body>
<p>Enter your the name of your budget: <input type="text" name="Budget Title" value="" id="title"></p>
<br>
<p> Set the starting date for your budget
<?php
	  require_once('calendar/tc_calendar.php');
	  $myCalendar = new tc_calendar("date1", true);
	  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  $myCalendar->setDate(01, 03, 1960);
	  $myCalendar->setPath("calendar/");
	  $myCalendar->setYearInterval(2013, 2015);
	  $myCalendar->dateAllow('192013-01-01', '2015-03-01');
	  $myCalendar->writeScript();
	  ?>
</p>
<br />
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