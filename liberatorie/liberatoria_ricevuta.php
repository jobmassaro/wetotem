<?php
//  Includi Configurazione

session_start();
use Models\Action;


include('../inc/mysql.inc.php');


$id_user = $_SESSION['user_id'];

$giococompleto = Action::ControlloCompleto($dbc);

$barcode = $_GET['barcode']; 



if ($giococompleto->codbar) 
{
  $nome = str_replace("+"," ",$_GET['nome']);
  $cognome = str_replace("+"," ",$_GET['cognome']);
  $sql ="SELECT nascita from ".DB_NAME.".".ACCREDITAMENTO." where barcode = '$barcode'";
  $nascita = $dbc->query($sql)->fetch_object()->nascita;
 }
 else
 {
  $sql = "select nome, cognome, nascita from ".DB_NAME.".".ACCREDITAMENTO." where barcode = '$barcode'";
  $result=mysqli_query($dbc,$sql);
  $rdb= mysqli_fetch_array($result, MYSQLI_ASSOC);
  $nome = str_replace("+"," ",$rdb['nome']);
  $cognome = str_replace("+"," ",$rdb['cognome']);
  $nascita =$rdb['nascita'];
  
 } 
$numero = $_GET['numero'];
$numero1 = $_GET['numero1'];
$numero2 = $_GET['numero2'];

if( $_GET['numero2']==="")
     $numero2 = '0';



if($numero === null || count($numero) == 0 )
      $numero = 0;

if($numero1 === null || count($numero1) == 0 )
      $numero1 = 0;

if($numero2 === null || count($numero2) == 0 )
      $numero2 = '0';

$numero10 = $numero*$giococompleto->prezzo1;
$numero5 = $numero*$giococompleto->valore1;
$numero110 = $numero1*$giococompleto->prezzo2;
$numero15 = $numero1*$giococompleto->valore2;
$numero1110 = $numero2*$giococompleto->prezzo3;
$numero115 = $numero2*$giococompleto->valore3;
$totale = $numero5+$numero15+$numero115;
list($data, $ora) = explode(" ", date("Y-m-d H:i:s"));

$sql = "SELECT SUM(carnet) as n, SUM(carnet1) as n1 FROM ".DB_NAME.".".VENDITA." WHERE barcode = '$barcode' AND date(data_vendita)=curdate()";
$venduti=mysqli_fetch_array(mysqli_query($dbc,$sql),MYSQLI_ASSOC);
$sql = "SELECT max1 as n, max2 as n1 FROM ".DB_NAME.".".CONCORSO;
$disponibili=mysqli_fetch_array(mysqli_query($dbc,$sql),MYSQLI_ASSOC);

if ($venduti['n']+$venduti['n1'] >= $disponibili['n']+$disponibili['n1']) 
  exit;

$query = "INSERT INTO ".DB_NAME.".".VENDITA." (
barcode,
nome,
cognome,
comune,
cap,
operatore,
carnet,
carnet1,
carnet2,
data_vendita,
nascita
)
VALUES ( 
'$barcode',  
'$nome',
'$cognome',
'$comune',
'$cap',
'$id_user',
'$numero',
'$numero1',
'$numero2',
 NOW(),
 '$nascita'
)";

$result = mysqli_query($dbc,$query) ;
$ricevuta = Action::ricevuta($dbc);                   
?>
<img src="../images/ricevuta.png" /><BR><BR>
RICEVUTA NR. <?=$ricevuta?> EMESSA DA :<BR>
WORLD EVENT SRL<BR>
VIA BIONAZ 40/9<BR>
10142 TORINO<BR>
P.IVA /C.F. 09568100011<BR>
EX IVA ART. 2 LETT. A COMMA 3<BR><BR>

 <?php if (!$giococompleto->codbar) { ?>
CODICE FISCALE <br><?=$barcode?><BR>
<?php }else{ ?>
BARCODE <br><?=$barcode?><BR>
<?php } ?>
NOME E COGNOME <br><?=$nome?> <?=$cognome?> <BR>
DATA <?=$data?><BR>
ORA <?=$ora?><BR>
ACQUISTA NR. <?=$numero?> Carnet<BR>
VALORE  COMMERCIALE Euro <?=$numero10?><BR>
INCASSO Euro <?=$numero5?> <br />
<?php if ($giococompleto->carnet2) { ?>
ACQUISTA NR. <?=$numero1?> <?=$giococompleto->carnet2?><BR>
VALORE  COMMERCIALE Euro <?=$numero110?><BR>
INCASSO Euro <?=$numero15?><br>
<?php } 
if ($giococompleto->carnet3) { ?>
ACQUISTA NR. <?=$numero2?> <?=$giococompleto->carnet3?><BR>
VALORE  COMMERCIALE Euro <?=$numero1110?><BR>
INCASSO Euro <?=$numero115?><br><br>
<?php } ?>
TOTALE INCASSO Euro <?=$totale?>
<br><br><br>
_______________________

<BR><BR><br>

<img src="../images/ricevuta.png" /><BR><BR>
RICEVUTA NR. <?=$ricevuta?> EMESSA DA :<BR>
WORLD EVENT SRL<BR>
VIA BIONAZ 40/9<BR>
10142 TORINO<BR>
P.IVA /C.F. 09568100011<BR>
EX IVA ART. 2 LETT. A COMMA 3<BR><BR>

  <?php if (!$giococompleto->codbar) { ?>
CODICE FISCALE <br><?=$barcode?><BR>
<?php }else{ ?>
BARCODE <br><?=$barcode?><BR>
<?php } ?>
NOME E COGNOME <br><?=$nome?> <?=$cognome?> <BR>
DATA <?=$data?><BR>
ORA <?=$ora?><BR>
ACQUISTA NR. <?=$numero?> Carnet<BR>
VALORE  COMMERCIALE Euro <?=$numero10?><BR>
INCASSO Euro <?=$numero5?> <br />
<?php if ($giococompleto->carnet2) { ?>
ACQUISTA NR. <?=$numero1?> <?=$giococompleto->carnet2?>P<BR>
VALORE  COMMERCIALE Euro <?=$numero110?><BR>
INCASSO Euro <?=$numero15?><br>
<?php } 
if ($giococompleto->carnet3) { ?>
ACQUISTA NR. <?=$numero2?> <?=$giococompleto->carnet3?><BR>
VALORE  COMMERCIALE Euro <?=$numero1110?><BR>
INCASSO Euro <?=$numero115?><br><br>
<?php } ?>
TOTALE INCASSO Euro <?=$totale?>


<script>
window.print();

window.setTimeout(alertFunc,'200');

function alertFunc() {
   window.close();
}
</script>

