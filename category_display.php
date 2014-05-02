	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<style>
		#content {
			background-color: rgba(2,2,2,.5);
			color: rgb(255,255,255);
		}
		#tabs {
			background-color: rgba(2,2,2,.5);
			color: rgb(255,255,255);
		}
		.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
 		 background-color: rgb(50,0,0);
		}
		#tabs2 {
			cursor:  pointer;
		}
		</style>
<div id="content">
	<?php
	$uuid = $_SESSION['userid'];
	$result = mysql_query("SELECT UDT FROM budget WHERE uid = $uuid AND type = 2");
	$row = mysql_fetch_row($result);
	echo '<center> <B> <font size="5">'.$row[0];

	$result = mysql_query("SELECT * FROM budget WHERE uid=$uuid AND type=1");?>

	<table class="table table-hover" id="tabs2" width="400">
	<tr>
	<th>&nbsp;Category&nbsp;</th>
	<th>&nbsp;Budgeted Amount&nbsp;</th>
	<th>&nbsp;Current Amount&nbsp;</th>

	<?php
	while($row = mysql_fetch_array($result))
  	{
		  echo "<tr id='tabs' class='clickableRow' href='viewtrans.php?t=".$row['UDT']."'>";
		  echo "<td>&nbsp;" . $row['UDT'] . "&nbsp;</td>";
		  echo "<td>&nbsp;" . "$" . $row['UDV'] . "&nbsp;</td>";
		echo "<td>&nbsp;" . "$" . $row['CUDV'] . "&nbsp;</td>";
		  echo "</tr>";
 	 }
	echo "</table>";

	?>
</div>
<script>
jQuery(document).ready(function($) {
      $(".clickableRow").click(function() {
            window.document.location = $(this).attr("href");
      });
});
</script>