<?php

session_start();

include('../inc/mysql.inc.php');

$data = json_decode(file_get_contents("php://input")); 

$user_leval = mysqli_real_escape_string($dbc, $data->user_leval);


$sql = "select * from ".DB_NAME.".".TABS." where user_level = '$user_leval'";
$r = mysqli_query($dbc, $sql);
//$uid = rand();
if (mysqli_num_rows($r) > 0) 
{
	
	// Fetch each item:
   while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
    {
        $arr[] = $row;    
    }

    echo json_encode($arr);	
} else
{
    echo json_encode(false);
}
