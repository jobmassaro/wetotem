<?php


require('./inc/mysql.inc.php');

$page_title = 'iGIGLI -';

//include('./includes/header.php');

//$r = mysqli_query($dbc, "SELECT * FROM test");

if($_GET['s'] == 'start')
{
   echo 'test';
}

if(isset($_SESSION['user']))
{
    include('./accounts/index.php');
}else{

    include('./views/index.php');
}
//include('./includes/footer.php');

?>