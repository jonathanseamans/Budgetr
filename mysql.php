<html>
<?php 

function Button1()
{
	echo "Hello World";
}

if (isset($_GET['hello'])) {
    Button1();
  }

 ?>
<body>
<a class="btn" href="mysql.php?hello=true">Link</a>
<button onclick="location.href='mysql.php?hello=true"> test </button>
</body>
</html>