<div id="content">
	<style><?php include 'css/budget.css'; ?></style>
	<?php
	$uuid = $_SESSION['userid'];
	$result = mysql_query("SELECT UDT FROM budget WHERE uid = $uuid AND type = 2");
	$row = mysql_fetch_row($result);
	echo $row[0]."<br>";
	?>
	<a href="edit_title.php"><button id="add">Edit Title</button></a>
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
	<br>
	<a href="category_setup.php"><button id="add">Add Category</button></a>
	<a href="transaction_1.php"><button id="add">Add Transaction</button></a>
</div>