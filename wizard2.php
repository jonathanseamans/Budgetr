<?php
//provide your hostname, username and dbname
include 'mysql.php';
$book_name = $_POST['title_name'];
$sql = "select * from budget where uid = '$book_name%'";
$result = mysql_query($sql);
while($row=mysql_fetch_array($result))
{
echo "<p>".$row['UDT']."</p>";
}
?>
