<html>
	<?php echo "Loading Your Budget Please Wait"; ?>
	<link rel="stylesheet" href="css/loading.css" type="text/css">
	<div class="ball"></div>
	<?php sleep(5); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
	</script>
	<script>
		document.getElementsByTagName('link')[0].disabled = true;
	</script>
</html>