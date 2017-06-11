<br />
<br />
<?php

use Models\Action;

session_start();

include('../inc/mysql.inc.php');

$data = $_GET['data'];
$level_user = $_SESSION['user_id'];


$giococompleto = Action::ControlloCompleto($dbc);


if (!$giococompleto->codbar)
{
    $sqlr3 = "select numero, numero1, numero2 from ".DB_NAME.".".CARNET." where date(data)='$data'";
    $resultr3=mysqli_query($dbc,$sqlr3);
    $rdb_contar3=mysqli_fetch_array($resultr3, MYSQLI_ASSOC);  
    $sqlr = "select sum(carnet) as totale, sum(carnet1) as totale1, sum(carnet2) as totale2 from ".DB_NAME.".".VENDITA." where date(data_vendita)='$data' ";

	$resultr=mysqli_query($dbc,$sqlr);
	$rdb_contar=mysqli_fetch_array($resultr, MYSQLI_ASSOC); 
	$totalissimo = $rdb_contar3['numero']-$rdb_contar['totale'];		
	$totalissimo1 = $rdb_contar3['numero1']-$rdb_contar['totale1'];
	$totalissimo2 = $rdb_contar3['numero2']-$rdb_contar['totale2'];

	$numero5 = $rdb_contar['totale']*$giococompleto->valore1;
	$numero10 = $rdb_contar['totale1']*$giococompleto->valore2;
	$numero20 = $rdb_contar['totale2']*$giococompleto->valore3;
	$totale = $numero5 + $numero10 + $numero20;

	$tessere = action::tessere($data,$dbc);
	$tessera = $tessere->giocate;
?>
CARD NUOVE FATTE NEL GIORNO <?=$tessera?><br /><br />
<?php if ($giococompleto->carnet1) { ?>
<?=$giococompleto->carnet1?> DISPONIBILI <?=$rdb_contar3['numero']?><br /><br />
SONO ANCORA DISPONIBILI <?=$totalissimo?> <?=$giococompleto->carnet1?><br /><br />
<?=$giococompleto->carnet1?> EMESSI <?=$rdb_contar['totale']?> PER UN INCASSO DI <?=$numero5?><br /><br />
<?php } ?>
<?php if ($giococompleto->carnet2) { ?>
<?=$giococompleto->carnet2?> DISPONIBILI <?=$rdb_contar3['numero1']?><br /><br />
SONO ANCORA DISPONIBILI <?=$totalissimo1?> <?=$giococompleto->carnet2?><br /><br />
<?=$giococompleto->carnet2?> EMESSI <?=$rdb_contar['totale1']?> PER UN INCASSO DI <?=$numero10?><br /><br />
<?php } ?>
<?php if ($giococompleto->carnet3) { ?>
<?=$giococompleto->carnet3?> DISPONIBILI <?=$rdb_contar3['numero2']?><br /><br />
SONO ANCORA DISPONIBILI <?=$totalissimo2?> <?=$giococompleto->carnet3?><br /><br />
<?=$giococompleto->carnet3?> EMESSI <?=$rdb_contar['totale2']?> PER UN INCASSO DI <?=$numero20?><br /><br />
<?php } 
$res_minMax=mysqli_query($dbc,"select MIN(id) as minID, MAX(id) as maxID from ".DB_NAME.".".VENDITA." where data_vendita LIKE '$data%'") ;
$minMax=mysqli_fetch_object($res_minMax);
if ($minMax->minID != NULL)
	echo 'RICEVUTE EMESSE DALL\'ID '.$minMax->minID.' ALL\'ID '.$minMax->maxID;
else
	echo 'NESSUNA RICEVUTA EMESSA';
	
?><br /><br />

<br /><br />
<?php if (($giococompleto->carnet3) || ($giococompleto->carnet2) || ($giococompleto->carnet1)) { ?>
TOTALE INCASSO Euro <?=$totale?>
<?php } 

} //IF BARCODE
else //CODICE FISCALE 
{
	$sqlr3 = "select numero, numero1, numero2 from ".DB_NAME.".".CARNET." where date(data)='$data'";
	$resultr3=mysqli_query($dbc, $sqlr3); 
    $rdb_contar3=mysqli_fetch_array($resultr3, MYSQLI_ASSOC); 
	$sqlr = "select sum(carnet) as totale, sum(carnet1) as totale1, sum(carnet2) as totale2 from ".DB_NAME.".".VENDITA." where date(data_vendita)='$data' ";
	$resultr=mysqli_query($dbc,$sqlr); 
    $rdb_contar=mysqli_fetch_array($resultr,MYSQLI_ASSOC); 
	
	$totalissimo = $rdb_contar3['numero']-$rdb_contar['totale'];		
	$totalissimo1 = $rdb_contar3['numero1']-$rdb_contar['totale1'];
	$totalissimo2 = $rdb_contar3['numero2']-$rdb_contar['totale2'];

	$numero5 = $rdb_contar['totale']*$giococompleto->valore1;
	$numero10 = $rdb_contar['totale1']*$giococompleto->valore2;
	$numero20 = $rdb_contar['totale2']*$giococompleto->valore3;
	$totale = $numero5 + $numero10 + $numero20;

	$tessere = action::tessere($data,$dbc);
	$tessera = $tessere->giocate;
	?>
	ACCREDITI FATTI NEL GIORNO:<b style="font-size:18px;"> <?=$tessera?></b><br /><br />
	<?php if ($giococompleto->carnet1) { ?>
	<?=$giococompleto->carnet1?> DISPONIBILI : <b style="font-size:18px;"><?=$rdb_contar3['numero']?></b><br /><br />
	SONO ANCORA DISPONIBILI <b style="font-size:18px;"><?=$totalissimo?></b> <?=$giococompleto->carnet1?><br /><br />
	<?=$giococompleto->carnet1?> EMESSI <?=$rdb_contar['totale']?> PER UN INCASSO DI <?=$numero5?><br /><br />
	<?php } ?>
	<?php if ($giococompleto->carnet2) { ?>
	<?=$giococompleto->carnet2?> DISPONIBILI <b style="font-size:18px;"><?=$rdb_contar3['numero1']?></b><br /><br />
	SONO ANCORA DISPONIBILI <b style="font-size:18px;"><?=$totalissimo1?></b> <?=$giococompleto->carnet2?><br /><br />
	<?=$giococompleto->carnet2?> EMESSI <b style="font-size:18px;"><?=$rdb_contar['totale1']?></b> PER UN INCASSO DI <b style="font-size:18px;"><?=$numero10?></b><br /><br />
	<?php } ?>
	<?php if ($giococompleto->carnet3) { ?>
	<?=$giococompleto->carnet3?> DISPONIBILI <b style="font-size:18px;"><?=$rdb_contar3['numero2']?></b><br /><br />
	SONO ANCORA DISPONIBILI <b style="font-size:18px;"><?=$totalissimo2?> <?=$giococompleto->carnet3?></b><br /><br />
	<?=$giococompleto->carnet3?> EMESSI <?=$rdb_contar['totale2']?> PER UN INCASSO DI <?=$numero20?><br /><br />
	<?php } 
	$res_minMax=mysqli_query($dbc,"select MIN(id) as minID, MAX(id) as maxID from ".DB_NAME.".".VENDITA." where data_vendita LIKE '$data%'");
	$minMax=mysqli_fetch_object($res_minMax);
	if ($minMax->minID != NULL)
		echo 'RICEVUTE EMESSE DALL\'ID <b style="font-size:18px;">'.$minMax->minID.' </b>  ALL\'ID <b style="font-size:18px;">'.$minMax->maxID .'</b>';
	else
		echo 'NESSUNA RICEVUTA EMESSA';
		
	?><br /><br />

	<br /><br />
	<?php if (($giococompleto->carnet3) || ($giococompleto->carnet2) || ($giococompleto->carnet1)) { ?>
	TOTALE INCASSO <b style="font-size:20px;">Euro <?=$totale?></b>
	<?php } 
}
?>