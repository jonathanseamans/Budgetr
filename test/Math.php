<?php
class Math
{
    /**
     * @param int $n1
     * @param int $n2
     *
     * @return int
     */
    function usersgetall()
    {
		include 'mysql.php';
		$result = mysql_query("SELECT * FROM user");
        

       while($row = mysql_fetch_array($result))
  	{
    	$new_array[] = "email:".$row['user_email']; // Inside while loop
		}


        return array($new_array);
    }

    /**
     * @param int $n1 {@from path}
     * @param int $n2 {@from path}
     *
     * @return array
     */
    function multiply($n1, $n2)
    {
        return array(
            'result' => ($n1 * $n2)
        );
    }

    /**
     * @url GET sum/*
     */
    function sum()
    {
        return array_sum(func_get_args());
    }
}