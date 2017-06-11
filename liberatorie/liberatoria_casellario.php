<?php
//  Includi Configurazione
require_once($_SERVER['DOCUMENT_ROOT']."/leduevalli/2016/conf/configuration.php");
$idx = $_GET['idx'];
$id = $_GET['id'];
$id_user = SecurityManager::getLoggedInUser("uno")->userid;
$giococompleto = Action::ControlloCompleto();
$queryupd="UPDATE ".DB_NAME.".".GIOCATA." set casellario = '$idx', stampato ='1', operatore = '$id_user' WHERE id = '$id'";
$result2 = mysql_query($queryupd) or die (mysql_error());
if ($giococompleto->casellario_multi) {
$query1="Select c.barcode, c.nome, c.cognome, d.data, e.premio, d.casellario from ".DB_NAME.".".ACCREDITAMENTO." c inner join ".DB_NAME.".".GIOCATA." d on c.barcode = d.barcode inner join ".DB_NAME.".".PREMIO_CASELLARIO." e on d.casellario = e.casella  WHERE d.id = '$id' and date(e.data)=curdate()";
}else{
$query1="Select c.barcode, c.nome, c.cognome, d.data, e.premio, d.casellario from ".DB_NAME.".".ACCREDITAMENTO." c inner join ".DB_NAME.".".GIOCATA." d on c.barcode = d.barcode inner join ".DB_NAME.".".PREMIO_CASELLARIO." e on d.casellario = e.casella  WHERE d.id = '$id' ";
}
$result1 = mysql_query($query1) or die (mysql_error());

$rd=mysql_fetch_array($result1); 
list($data, $ora) = explode(" ", $rd['data']);
?>

<?=$giococompleto->nome?> <br /><br />
<?=$giococompleto->card?> <?=$rd['barcode']?><br />
SIG <?=$rd['cognome']?>&nbsp;<?=$rd['nome']?><br />
DATA <?=$data?><br />
ORA <?=$ora?><br />
vince <?=$rd['premio']?><br />
casella scelta nr <?=$rd['casellario']?><br />
<?=$giococompleto->privacy?>
_________________________________________

<br /><br /><?=$giococompleto->nome?> <br /><br />
<?=$giococompleto->card?> <?=$rd['barcode']?><br />
SIG <?=$rd['cognome']?>&nbsp;<?=$rd['nome']?><br />
DATA <?=$data?><br />
ORA <?=$ora?><br />
vince <?=$rd['premio']?><br />
casella scelta nr <?=$rd['casellario']?><br />
<?=$giococompleto->privacy?>