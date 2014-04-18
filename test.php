<html>
<div id="panel">
  <input type="button" class="button" value="1" id="btn1">
  <input type="button" class="button" value="2" id="btn2">
  <input type="button" class="button" value="3" id="btn3">
  <br>
  <input type="text" id="valueFromMyModal">
  <!-- Dialog Box-->
  <div class="dialog" id="myform">
    <form>
      <label id="valueFromMyButton">
      </label>
      <input type="text" id="name">
      <div align="center">
        <input type="button" value="Ok" id="btnOK">
      </div>
    </form>
  </div>
</div>
<script>
$(function() {
    $(".button").click(function() {
        $("#myform #valueFromMyButton").text($(this).val().trim());
        $("#myform input[type=text]").val('');
        $("#myform").show(500);
    });
    $("#btnOK").click(function() {
        $("#valueFromMyModal").val($("#myform input[type=text]").val().trim());
        $("#myform").hide(400);
    });
});
</script>
<style>
.button{
  border:1px solid #333;
  background:#6479fd;
}
.button:hover{
  background:#a4a9fd;
}
.dialog{
  border:5px solid #666;
  padding:10px;
  background:#3A3A3A;
  position:absolute;
  display:none;
}
.dialog label{
  display:inline-block;
  color:#cecece;
}
input[type=text]{
  border:1px solid #333;
  display:inline-block;
  margin:5px;
}
#btnOK{
  border:1px solid #000;
  background:#ff9999;
  margin:5px;
}

#btnOK:hover{
  border:1px solid #000;
  background:#ffacac;
}
</style>
</html>