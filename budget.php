<html>
	<link rel="stylesheet" href="css/loading.css" type="text/css">
	<?php
		$loadmessage = "Loading Your Budget Please Wait";
		ob_start();

		echo $loadmessage;
	?>
	<link rel="stylesheet" href="css/loading.css" type="text/css">
	<?php
		ob_flush();
		sleep(5);
	?>
	<script>
		document.getElementsByTagName('link')[0].disabled = true;
	</script>
	<?php
		ob_flush();
		$loadmessage = '';
		echo $loadmessage;
	?>
</html>