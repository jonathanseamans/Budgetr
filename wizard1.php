<html>
<body>
<p>Enter your the name of your budget: <input type="text" name="Budget Title" value="" id="title"></p>
<br>
<p> Set the starting date for your budget
<?php
	  function date_picker($name, $startyear=NULL, $endyear=NULL)
{
    if($startyear==NULL) $startyear = date("Y")-100;
    if($endyear==NULL) $endyear=date("Y")+50; 

    $months=array('','January','February','March','April','May',
    'June','July','August', 'September','October','November','December');

    // Month dropdown
    $html="<select name=\"".$name."month\">";

    for($i=1;$i<=12;$i++)
    {
       $html.="<option value='$i'>$months[$i]</option>";
    }
    $html.="</select> ";
   
    // Day dropdown
    $html.="<select name=\"".$name."day\">";
    for($i=1;$i<=31;$i++)
    {
       $html.="<option $selected value='$i'>$i</option>";
    }
    $html.="</select> ";

    // Year dropdown
    $html.="<select name=\"".$name."year\">";

    for($i=$startyear;$i<=$endyear;$i++)
    {      
      $html.="<option value='$i'>$i</option>";
    }
    $html.="</select> ";

    return $html;
}
echo date_picker("registration"); 
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