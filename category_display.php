<div id="content">
	<?php
	$uuid = $_SESSION['userid'];
	$result = mysql_query("SELECT UDT FROM budget WHERE uid = $uuid AND type = 2");
	$row = mysql_fetch_row($result);
	echo $row[0]."<br>"."<br>";

	$result = mysql_query("SELECT * FROM budget WHERE uid=$uuid AND type=1");
//	$row = mysql_fetch_assoc($result);
//	$count=count($row);

	echo "<table border='1'>
<tr>
<th> Category </th>
<th> Amount </th>";


	while($row = mysql_fetch_array($result))
  	{
		  echo "<tr>";
		  echo "<td>" . $row['UDT'] . "</td>";
		  echo "<td>" . "$" . $row['UDV'] . "</td>";
		  echo "</tr>";
 	 }
	echo "</table>";

	?>
</div>
