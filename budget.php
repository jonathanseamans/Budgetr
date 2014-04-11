<HTML>
<BODY>
<DIV ID="flushme">
	Hello, world!
</DIV>
<?php flush(); sleep(2); ?>
<SCRIPT>
	d = document.getElementById("flushme");
	d.innerHTML = "Goodbye, Perl!";
</SCRIPT>
<?php flush(); sleep(2); ?>
<SCRIPT>
	d.innerHTML = "Goodnight, New York!";
</SCRIPT>
</BODY>
</HTML>