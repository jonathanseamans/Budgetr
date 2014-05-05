<div class="modal-header" id="modhead">
<style>
#modbody {
width: 50%;
color: black;
background-color: white;
}
#modhead {
width: 50%;
color: black;
background-color: white;
}
#modyfooty {
width: 50%;
background-color: white;
}
</style>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
             <h4 class="modal-title">Register</h4>
        </div>            <!-- /modal-header -->
          <div class="modal-body" id="modbody">
	<div> 
		<table width="400" border="0" cellspacing="1" cellpadding="2">
		<tr>
		<td width="100">Enter your Email Address</td>
		<td><input name="user_email" type="text" id="reg_email"></td>
		</tr>
		<tr>
		<td width="100">Enter your Password</td>
		<td><input name="user_password" type="password" id="reg_password"></td>
		</tr> 
		<tr>
		<td width="100">Confirm your Password</td>
		<td><input name="user_password2" type="password" id="user_password2"></td>
		</tr>
		<tr>
		<td width="100"> </td>
		<td> </td>
		</tr>
		<tr>
		<td width="100"> </td>
		<td>
		<button  class="btn btn-success" onclick="submit()">Register</button>
		</td>
		<div id='tresponse'/>
		</tr>
		</table>
		<script>
			function submit()
			{
				var email = document.getElementById('reg_email').value;
				var password = document.getElementById("reg_password").value;
				var xhr;
				if (window.XMLHttpRequest) { // Mozilla, Safari, ...
					xhr = new XMLHttpRequest();
				} else if (window.ActiveXObject) { // IE 8 and older
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
				}
				var data = "reg_email=" + email + "&reg_password=" + password;
				xhr.open("POST", "register_2.php", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xhr.send(data);
				xhr.onreadystatechange = display_data;
				function display_data() {
					if (xhr.readyState == 4) {
						if (xhr.status == 200) {
							document.getElementById("tresponse").innerHTML = xhr.responseText;

						} else {
							alert('There was a problem with the request.');
						}
					}
				}
			}
		</script>
	</div>
 </div><!-- /modal-body -->
        <div class="modal-footer" id="modfooty">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>            <!-- /modal-footer -->