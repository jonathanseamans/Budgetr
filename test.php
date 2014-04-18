<!DOCTYPE html>
<html>
<head>
<script src="jquery/jquery-1.11.0.min.js"></script>
 
<script>
$(document).ready(function(){
 
	$("#buttonFirstNameLastName").click(function(){
		$.ajax({url:"test2.php",success:function(result){
			var obj1 = $.parseJSON(result);
 
			//Populate first name drop down
			var options = '';
			for (var i = 0; i < obj1.length; i++) {
				options += '<option value="' + obj1[i].id + '">' + obj1[i].firstname + '</option>';
			}
			$("#firstNameList").html(options);
 
			//Populate last name drop down
			var options = '';
			for (var i = 0; i < obj1.length; i++) {
				options += '<option value="' + obj1[i].id + '">' + obj1[i].lastname + '</option>';
			}
			$("#lastNameList").html(options);
		}});
	});
 
	$("#buttonEmailTelephone").click(function(){
		$.ajax({url:"test2.php",success:function(result){
			var obj2 = $.parseJSON(result);
 
			//Populate first name drop down
			var options = '';
			for (var i = 0; i < obj2.length; i++) {
				options += '<option value="' + obj2[i].id + '">' + obj2[i].email + '</option>';
			}
			$("#emailList").html(options);
 
			//Populate last name drop down
			var options = '';
			for (var i = 0; i < obj2.length; i++) {
				options += '<option value="' + obj2[i].id + '">' + obj2[i].telephone + '</option>';
			}
			$("#phoneList").html(options);
		}});
	});
 
});
</script>
</head>
 
<body>
<div id="div1" ><h2>Populate First Name and Last Name from BACKEND.php w/ JSON data</h2>
		<button id="buttonFirstNameLastName">Get First Name & Last Name from Backend.PHP</button>
 
 
		<h4>Drop down list with First Name</h4>		<select name="fname" id="firstNameList">
			<option value="place holder">Click the button</option>
		</select>
		<select name="lname" id="lastNameList">
			<option value="place holder">Click the button</option>
		</select>
	</div
 
	<div id="div2"><h2>Populate eMail and Telephone from BACKEND.php w/ JSON data </h2>
		<button id="buttonEmailTelephone">Get eMail & Telephone</button>
 
		<h4>Drop down list with First Name</h4>
		<select name="emila" id="emailList">
			<!-- will be populated by backend data -->
		</select>
		<select name="phone" id="phoneList">
			<!-- will be populated by backend data -->
		</select>
	</div>
 
</body>
</html>