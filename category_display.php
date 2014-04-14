<div id="content">
	<?php
	$uuid = $_SESSION['userid'];
	$result = mysql_query("SELECT UDT FROM budget WHERE uid = $uuid AND type = 2");
	$row = mysql_fetch_row($result);
	echo $row[0]."<br>"."<br>";

	$result = mysql_query("SELECT * FROM budget WHERE uid=$uuid AND type=1");
//	$row = mysql_fetch_assoc($result);
//	$count=count($row);


	while ($row = mysql_fetch_assoc($result)) {
		echo "Category \x20".$row['UDV']."\x20 Current Value \x20".$row['UDV']."<br>";
	}

//	for ($i=0; $i<12; $i++)
//	{
//		echo $row['UDV']."\x20"."<br>";
//		echo $count."<br>";
//	}
//	.$row['UDV']

	?>
</div>
