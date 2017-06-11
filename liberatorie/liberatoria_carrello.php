<?php
//  Includi Configurazione
require_once($_SERVER['DOCUMENT_ROOT']."/leduevalli/2016/conf/configuration.php");
$id = $_GET['id'];
$id_user = SecurityManager::getLoggedInUser("uno")->userid;
$giococompleto = Action::ControlloCompleto();
$queryupd="UPDATE ".DB_NAME.".".GIOCATA." set stampato ='1', operatore = '$id_user' WHERE id = '$id'";
$result2 = mysql_query($queryupd) or die (mysql_error());
$query1="Select c.barcode, c.nome, c.cognome, d.*, e.insegna, e.valminimo from ".DB_NAME.".".ACCREDITAMENTO." c inner join ".DB_NAME.".".GIOCATA." d on c.barcode = d.barcode inner join ".DB_NAME.".".PV." e on e.id = d.esercizio WHERE d.id = '$id'";
$result1 = mysql_query($query1) or die (mysql_error());

$rd=mysql_fetch_array($result1); 
list($data, $ora) = explode(" ", $rd['data']);

switch (true){
	case ($rd['carrello'] == "premio1" ):
	    $premipremi = action::premipremi("premio1");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio2" ):
	    $premipremi = action::premipremi("premio2");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio3" ):
	    $premipremi = action::premipremi("premio3");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio4" ):
	    $premipremi = action::premipremi("premio4");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio5" ):
	   $premipremi = action::premipremi("premio5");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio6" ):
	    $premipremi = action::premipremi("premio6");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio7" ):
	    $premipremi = action::premipremi("premio7");
	    $crediti = $premipremi ->nome; break;
	case ($rd['carrello'] == "premio8" ):
	   $premipremi = action::premipremi("premio8");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio9" ):
	    $premipremi = action::premipremi("premio9");
	    $crediti = $premipremi ->nome; break;
	case ($rd['carrello'] == "premio10" ):
	    $premipremi = action::premipremi("premio10");
	    $crediti = $premipremi ->nome; break;
	case ($rd['carrello'] == "premio11" ):
	    $premipremi = action::premipremi("premio11");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio12" ):
	    $premipremi = action::premipremi("premio12");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio13" ):
	    $premipremi = action::premipremi("premio13");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio14" ):
	    $premipremi = action::premipremi("premio14");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio15" ):
	    $premipremi = action::premipremi("premio15");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio16" ):
	    $premipremi = action::premipremi("premio16");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio17" ):
	    $premipremi = action::premipremi("premio17");
	    $crediti = $premipremi ->nome; break;
	case ($rd['carrello'] == "premio18" ):
	   $premipremi = action::premipremi("premio18");
	    $crediti = $premipremi ->nome; break;
    case ($rd['carrello'] == "premio19" ):
	    $premipremi = action::premipremi("premio19");
	    $crediti = $premipremi ->nome; break;
	case ($rd['carrello'] == "premio20" ):
	    $premipremi = action::premipremi("premio20");
	    $crediti = $premipremi ->nome; break;
	case ($rd['carrello'] == "euro"):
	    $crediti = "RIMBORSO SCONTRINO"; break;
	} ?>

<br /><br /><?=$giococompleto->nome?> <br /><br />

<?=$giococompleto->card?> <?=$rd['barcode']?><br /> 

SIG <?=$rd['cognome']?>&nbsp;<?=$rd['nome']?><br />
DATA <?=$data?><br />
ORA <?=$ora?><br />

Vince <br />
<?=$crediti?><br />
<?php if  ($giococompleto->stampavalorescontrino) { ?>
<br />Scontrino N° <?=$rd['numero_mappa']?><br>
Esercizio <?php echo $rd['insegna']; if ($rd['valminimo'] == 1) echo "RISTORAZIONE"; ?><br>
Importo Euro <?=$rd['importo_mappa']?><br>
<?php } ?>
<br /><?=$giococompleto->privacy?>