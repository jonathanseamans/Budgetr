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
<a href="mysql.php?hello=true"><button>Your First Button</button></a>
<button onclick="location.href='mysql.php?hello=true"> test </button>
</body>
</html>