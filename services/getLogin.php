<?php

use Models\User;


session_start();


include('../inc/mysql.inc.php');

$data = json_decode(file_get_contents("php://input")); 



$username = mysqli_real_escape_string($dbc, $data->username);
$password = mysqli_real_escape_string($dbc, $data->password);
$arr = array();
$sql = "SELECT * FROM " . DB_NAME . "." . ADMIN . " WHERE username = '$username' AND password='{$password}' LIMIT 1";
$r = mysqli_query($dbc, $sql);
//$uid = rand();
if (mysqli_num_rows($r) > 0) 
{
	
	// Fetch each item:
   while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
    {
        $_SESSION['user'] = $row['username'];
        $_SESSION['level']  =$row['user_level'];
        $_SESSION['user_id']  =$row['adminid'];
        $_SESSION['start'] = time(); // Taking now logged in time.
        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
        $arr[] = $row;    
    }

    echo json_encode($arr);	
} else
{
    echo json_encode(false);
}



