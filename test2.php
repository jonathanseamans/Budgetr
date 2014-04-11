<?php
define('INCLUDE_CHECK',true);
include 'mysql.php';

$userID=$_GET["userID"];
$sql="SELECT * FROM budget WHERE uid = '2'";
$result = mysql_query($sql);

while($row=mysql_fetch_array($result))
{
echo "<p>".$row['UDT']."</p>";
}

?>