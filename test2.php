<?php
define('INCLUDE_CHECK',true);
include 'mysql.php';

$userID=$_GET["userID"];
$sql="SELECT * FROM budget WHERE uid = '".$userID."'";
$result = mysql_query($sql);

$returned_rows = mysql_num_rows ($result);

    if ($returned_rows == 0){
        echo '-- No results found --';
    }
    else {
        while($row = mysql_fetch_array($result)) {
        echo "<div class='column'>";
        echo '<label>Name:</label>' . $row['UDT'] . '';
        echo '</div>';
        }
     }

mysql_close($con);
?>