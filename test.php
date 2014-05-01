<style type="text/css">
label.valid {
width: 24px;
height: 24px;
background: url(../img/valid.png) center center no-repeat;
display: inline-block;
text-indent: -9999px;
}
label.error {
font-weight: bold;
padding: 2px 8px;
margin-top: 2px;
}
</style>
<html>
<div class="container-fluid">
<div class="row-fluid">
<div class="span9 offset3">
<form action="" id="contact-form" class="form-horizontal" method="post">
<fieldset>
    <div class="control-group">
        <label class="control-label" for="name">Your Name</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="name" id="name">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="email">Email Address</label>
<div class="controls">
            <input type="text" class="input-xlarge" name="email" id="email">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="subject">Subject</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="subject" id="subject">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="message">Your Message</label>
        <div class="controls">
            <textarea class="input-xlarge" name="message" id="message" rows="3"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Send Email</button>
        </div>
    </div>
</fieldset>
</form>
<!-- We will output the results from process.php here -->
<div id="results"></div>
</div>
</div>
</div>
</html>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
 $('#contact-form').validate({
  rules: {
   name: {
    minlength: 2,
    required: true
   },
   email: {
    required: true,
    email: true
   },
   subject: {
    minlength: 2,
    required: true
   },
   message: {
    minlength: 2,
    required: true
   }
  },
  highlight: function(element) {
   $(element).closest('.control-group').removeClass('success').addClass('error');
  },
  success: function(element) {
   element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
  },
  submitHandler: function(form) {
   // do other stuff for a valid form
   $.post('test2.php', $("#contact-form").serialize(), function(data) {
    $("#contact-form").hide();
    $('#results').html(data);
   });
  }
 });
}); // end document.ready
</script>