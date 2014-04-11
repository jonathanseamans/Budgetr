<html> 
	<body>
		<p>Enter your Title Name: <input type="text" name="Budget Title" value="" id="title"></p>
		<br />
		<button onclick="title_name()">Save</button>
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
       //alert(xhr.responseText);	   
	  document.getElementById("titleresponse").innerHTML = xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
     }
	}
}
</script>