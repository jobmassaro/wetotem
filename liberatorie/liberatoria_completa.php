<?php
//  Includi Configurazione
require_once($_SERVER['DOCUMENT_ROOT']."/leduevalli/2016/conf/configuration.php");
$barcode = $_GET['barcode'];
$id_user = SecurityManager::getLoggedInUser("uno")->userid;
$giococompleto = Action::ControlloCompleto();
$queryupd="UPDATE ".DB_NAME.".".ACCREDITAMENTO." set operatore = '$id_user' WHERE barcode = '$barcode'";
$result2 = mysql_query($queryupd) or die (mysql_error());
$query1="Select nome, cognome, barcode from ".DB_NAME.".".ACCREDITAMENTO." WHERE barcode = '$barcode'";
$result1 = mysql_query($query1) or die (mysql_error());

$rd=mysql_fetch_array($result1); 
list($data, $ora) = explode(" ", date("Y-m-d H:i:s"));
?>

<br /><br /><?=$giococompleto->nome?><br />

<?=$giococompleto->card?> <?=$rd['barcode']?><br />
SIG <?=$rd['cognome']?>&nbsp;<?=$rd['nome']?><br />
DATA <?=$data?><br />
ORA <?=$ora?><br />
INFORMATIVA AI SENSI DELL'ART.13<br />D.LGS. 196/2003 <br />"CODICE IN MATERIA DI PROTEZIONE<br />DEI DATI PERSONALI"<br />
ho accettato di aggiungere<br />i campi contrassegnati dalla<br />x ( a integrazione della<br />liberatoria firmata in occasione di cessione card)<br />
per avere la possibilit&agrave;<br />di tentare di vincere tutte<br />le tipologie di premi concorso<br />
O  CELLULARE<br />
O  MAIL<br />
O  2 AUTORIZZAZIONE<br /><br>
firma.....................................................