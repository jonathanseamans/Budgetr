	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
<style>
	#content{
		color: rgb(255,255,255);
}
th {
	color: rgb(255,255,255);
}

</style>
<div id="content">
	<?php
	$uuid = $_SESSION['userid'];
	$result = mysql_query("SELECT UDT FROM budget WHERE uid = $uuid AND type = 2");
	$row = mysql_fetch_row($result);
	echo $row[0]."<br>";
	?>
	<br>
	<?php

	$result = mysql_query("SELECT * FROM budget WHERE uid=$uuid AND type=1");
//	$row = mysql_fetch_assoc($result);
//	$count=count($row);

	echo "<table border='1'>
<tr>
<th>&nbsp;Category&nbsp;</th>
<th>&nbsp;Budgeted Amount&nbsp;</th>
<th>&nbsp;Current Amount&nbsp;</th>";


	while($row = mysql_fetch_array($result))
  	{
		  echo "<tr>";
		  echo "<td>&nbsp;" . $row['UDT'] . "&nbsp;</td>";
		  echo "<td>&nbsp;" . "$" . $row['UDV'] . "&nbsp;</td>";
		echo "<td>&nbsp;" . "$" . $row['CUDV'] . "&nbsp;</td>";
		  echo "</tr>";
 	 }
	echo "</table>";

	?>
</div>