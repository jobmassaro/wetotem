<?php 
use Models\User;


session_start();


include('../inc/mysql.inc.php');

$sql="SELECT numero,numero1,numero2 FROM  ".DB_NAME.".".CARNET." WHERE data = CURDATE()";
$arr = array();
$rs = mysqli_query($dbc, $sql);
        //$uid = rand();
if (mysqli_num_rows($rs) > 0) 
{
        while ($r = mysqli_fetch_array($rs, MYSQLI_ASSOC))
        {
            $arr[] = $r;
        }
}

 echo json_encode($arr);	

					