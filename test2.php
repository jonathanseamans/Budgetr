<?php
include 'mysql.php';
$book_name = $_POST['book_name'];
$sql = "select * from budget where uid LIKE '$book_name%'";
$result = mysql_query($sql);
while($row=mysql_fetch_array($result))
{
echo "<p>".$row['UDT']."</p>";
}
?>