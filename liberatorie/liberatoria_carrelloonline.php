<?php
//  Includi Configurazione
require_once($_SERVER['DOCUMENT_ROOT']."/leduevalli/2016/conf/configuration.php");
$id = $_GET['id'];
$id_user = SecurityManager::getLoggedInUser("uno")->userid;
$giococompleto = Action::ControlloCompleto();
$queryupd="UPDATE ".DB_NAME.".".GIOCATA_ONLINE." set stampato ='1', operatore = '$id_user' WHERE id = '$id'";
$result2 = mysql_query($queryupd) or die (mysql_error());
$query1="Select c.barcode, c.nome, c.cognome, d.carrello, d.data, d.casellario from ".DB_NAME.".".ACCREDITAMENTO." c inner join ".DB_NAME.".".GIOCATA_ONLINE." d on c.barcode = d.barcode WHERE d.id = '$id'";
$result1 = mysql_query($query1) or die (mysql_error());

$rd=mysql_fetch_array($result1); 
list($data, $ora) = explode(" ", $rd['data']);
switch (true){
	case ($rd['carrello'] == "premio1" ):
	    $premipremi = action::premipremi_online("premio1");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio2" ):
	    $premipremi = action::premipremi_online("premio2");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio3" ):
	    $premipremi = action::premipremi_online("premio3");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio4" ):
	    $premipremi = action::premipremi_online("premio4");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio5" ):
	   $premipremi = action::premipremi_online("premio5");
	    $crediti = $premipremi ->nome; break;
	} ?>

<br /><br /><?=$giococompleto->nome?><br />

<?=$giococompleto->card?> <?=$rd['barcode']?><br /> 
SIG <?=$rd['cognome']?>&nbsp;<?=$rd['nome']?><br />
DATA <?=$data?><br />
ORA <?=$ora?><br />
Vince un<br />
<?=$crediti?><br /><br />
<?=$giococompleto->privacy?>