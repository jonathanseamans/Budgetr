<html>
<script type="text/javascript" src="jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jquery/jquery.easyModal.js"></script>
<body>
  <button id="open"> test </button>
  <div id="test">
  <p> hello </p>
  </div>
</body>
</html>
<script>
$(function() {
    $("#test").easyModal();
});
$("#open").trigger('openModal');
</script>