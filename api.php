<?php 

  include 'mysql.php'
  $result = mysql_query("SELECT * FROM budget");
  $array = mysql_fetch_row($result);                          //fetch result    

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($array);

?>