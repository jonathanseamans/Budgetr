<html> 
	<body>
		<p>Enter your Title Name: <input type="text" name="Budget Title" value="" id="title"></p>
		<br />
		<button onclick="submit()">Save</button>
		<div id='titleresponse'>
			<?php
				function submit(){
				include 'mysql.php';
				session_start();
				$title_name = $_POST['title_name'];
				$uuid = $_SESSION['userid'];
				// type 2 == title
				$sql = "INSERT INTO budget (uid,bid,type,UDT) VALUES ('$uuid','1','2','$title_name')";
				mysql_query($sql);
				echo "Title Saved";
				sleep(2);
				header("refresh:");
				}
			?>
		</div>
	</body>
</html>
