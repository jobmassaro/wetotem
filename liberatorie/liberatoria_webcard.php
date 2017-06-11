<?php
//  Includi Configurazione
require_once($_SERVER['DOCUMENT_ROOT']."/leduevalli/2016/conf/configuration.php");
$barcode = $_GET['barcode'];
$giococompleto = Action::ControlloCompleto();
$id_user = SecurityManager::getLoggedInUser("uno")->userid;
$queryupd="UPDATE ".DB_NAME.".".CODICEONLINE." set operatore = '$id_user' WHERE codice = '$barcode'";
$result2 = mysql_query($queryupd) or die (mysql_error());
$data = date ("Y-m-d");
?>
<p><?=$giococompleto->nome?><br /><br />
CODICE: <?=$barcode?><br /><br>

DATA <?=$data?><br /><br>
Collegarsi al sito internet<br />
Inserire il codice<br />entro il <?=$data?> <br>
per provare a vincere<br />i premi online</p>