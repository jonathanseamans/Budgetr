<!DOCTYPE html> 
<html lang="en"> 
<body>
<form name="myform">
	<strong>Client ID:</strong>
	<input name="user" type="text" class="textBox" maxlength="10" />
	<input type="submit" onclick="showUser(document.myform.user.value); return false;"> 
</form>
<script type="text/javascript">
	function showUser(str)
	{
	if (str=="") {
	  document.getElementById("txtHint").innerHTML="";
	  return;
	  }
	if (window.XMLHttpRequest) {
	  xmlhttp=new XMLHttpRequest();
	  }
	else {
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	    xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","test2.php?userID="+str,true);
	xmlhttp.send();
	}
</script>
</body>
</html>

