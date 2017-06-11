<?php
//  Includi Configurazione
require_once($_SERVER['DOCUMENT_ROOT']."/leduevalli/2016/conf/configuration.php");

$id_user = SecurityManager::getLoggedInUser("uno")->userid;
$barcode = $_GET['barcode']; 
$data = $_GET['data'];
$query1="Select nome, cognome, barcode from ".DB_NAME.".".ACCREDITAMENTO." WHERE barcode = '$barcode'";
$result1 = mysql_query($query1) or die (mysql_error());
$rd=mysql_fetch_array($result1); 
                 
?>

BARCODE <?=$rd['barcode']?><br>
SIG <?=$rd['cognome']?><br><?=$rd['nome']?><br />
DATA <?=$data?><br />
Numero di Uova<br />
<?php 
$query2="Select bambino, databambino, uovo from ".DB_NAME.".".UOVO." WHERE barcode = '$barcode' order by id DESC LIMIT 1";
$result2 = mysql_query($query2) or die (mysql_error());
while ($rdu=mysql_fetch_array($result2)) { 
echo $rdu['uovo']."<br>";
} ?>
Nome Bambino <?=$rdu['bambino']?><br />
Data Nascita <?=$rdu['databambino']?>