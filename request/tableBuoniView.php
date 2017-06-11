<?php

session_start();
use Models\Action;


include('../inc/mysql.inc.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <META HTTP-EQUIV="Refresh" CONTENT="5; url=tableBuoniView.php"> 
        <title>BUONI</title>
   
    <style type="text/css">

#testo {
	
    font-size: 80px;
	color: #FFF;
	margin-top: 485px;
	align: "center";
}

    </style>
    </head>
    <body background="/gialdo/images/sfondo.jpg">
    <div align="center">
        <?php 

$time = date("H:i:s");
$giococompleto = Action::ControlloCompleto($dbc);
$sqlr = "select sum(carnet) as totale, sum(carnet1) as totale1, sum(carnet2) as totale2 from ".DB_NAME.".".VENDITA." where date(data_vendita)=curdate() ";
    $resultr=mysqli_query($dbc,$sqlr);
        $rdb_contar=mysqli_fetch_array($resultr, MYSQLI_ASSOC);
		$sql4 = "select numero as carnet, numero1 as carnet1, numero2 as carnet2 from ".DB_NAME.".".CARNET." WHERE data = curdate( ) and (ora_inizio< '{$time}' and ora_fine>'{$time}' )";
        
    $result4=mysqli_query($dbc,$sql4);
        $rdb_contar4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
$totalissimo = $rdb_contar4['carnet']-$rdb_contar['totale'];		
$totalissimo1 = $rdb_contar4['carnet1']-$rdb_contar['totale1'];
$totalissimo2 = $rdb_contar4['carnet2']-$rdb_contar['totale2'];
$tot = $totalissimo + $totalissimo1 + $totalissimo2;
?>
<div id='testo'>
<?php
if (!$rdb_contar4['carnet'])
{ ?>
<br><strong>VENDITA CHIUSA</strong><br /><br />
<?php 
die; }
if (($totalissimo == 0) && ($totalissimo1 == 0) && ($totalissimo2 == 0)) { ?>
<strong>ESAURITI TUTTI I BUONI</strong><br /><br />
<?php } else { 
if ($giococompleto->buoniTot) { ?>
<strong>OGGI SONO ANCORA DISPONIBILI <?=$tot?> BUONI SPESA</strong>
<?php }else{ ?>
<strong>OGGI SONO DISPONIBILI ANCORA </strong>
<br><br><strong><?=$totalissimo?> <?=$giococompleto->carnet1?> </strong><br>
<?php if($totalissimo1) { ?><strong><?=$totalissimo1?> <?=$giococompleto->carnet2?></strong><br><br><?php } ?> 
<?php if($totalissimo2) { ?><strong><?=$totalissimo2?> <?=$giococompleto->carnet3?></strong><br><br><?php } ?> 
<br />

<?php } } ?>
</div>
</div>
   </body>
</html>
