<html>
	<?php echo "Loading Your Budget Please Wait"; ?>
	<style>
		<?php include 'css/loading.css'; ?>
	</style>
	<div class="ball"></div>
	<?php sleep(5); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
	</script>
	<script>
		$("link[href='css/loading.css']").remove();
	</script>
</html>