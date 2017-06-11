<?php
//  Includi Configurazione
require_once($_SERVER['DOCUMENT_ROOT']."/leduevalli/2016/conf/configuration.php");

$id_user = SecurityManager::getLoggedInUser("uno")->userid;
$barcode = $_GET['barcode'];
$password = $_GET['password'];
$foto = $_GET['foto']; 
$today = date("Y-m-d");  
$giococompleto = Action::ControlloCompleto();
?>
<br><?=$today?>
<br>Scarica la tua foto
<br><strong><?=$foto?></strong> 
<br>dal sito
<br><?=$giococompleto->sito?>
<br>usando la password
<br><strong><?=$password?></strong>


