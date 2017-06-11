<?php 
session_start();
use Models\Action;


include('../inc/mysql.inc.php');

        
$barcode = strtoupper($_GET['barcode']);
$giococompleto = Action::ControlloCompleto($dbc);
 
 //if (!$giococompleto->codbar) {


$controllobarcode = Action::controllobarcode($barcode,$dbc);
if (!$controllobarcode) 
{ 
    if (!$giococompleto->codbar) echo 'BARCODE NON PRESENTE INSERIRE ANAGRAFICA ';
    else echo 'CODICE FISCALE NON PRESENTE INSERIRE ANAGRAFICA ';
    die; 
} 


//}
if ($giococompleto->codbar) 
{
	
    

    $sql = "select distinct id ,barcode,nome,cognome,nascita,cf,indirizzo,civico,cap,comune,provincia,email,telefono,mobile,data,privacy,privacy2,sesso,operatore,eliminata,blocca 
            from ".DB_NAME.".".ACCREDITAMENTO." where barcode = '$barcode'";
    $result=mysqli_query($dbc,$sql);

    $anagrafica=mysqli_fetch_array($result, MYSQLI_ASSOC);
    $nome = str_replace(" ","+",$anagrafica['nome']);
    $cognome = str_replace("'","&#039;",$anagrafica['cognome']);
    $nome = str_replace("'","&#039;",$nome);
    $cognome = str_replace(" ","+",$cognome);
    $nascita = $anagrafica['nascita'];
    /*
    $nome = str_replace(" ","+",$_GET['nome']);
    $cognome = str_replace("'","&#039;",$_GET['cognome']);
    $nome = str_replace("'","&#039;",$nome);
    $cognome = str_replace(" ","+",$cognome);
    $nascita = $_GET['nascita'];
    $comune = $_GET['comune'];
    $cap = $_GET['cap'];
    */
 }
 else
 {

     $sql = "select distinct id ,barcode,nome,cognome,nascita,cf,indirizzo,civico,cap,comune,provincia,email,telefono,mobile,data,privacy,privacy2,sesso,operatore,eliminata,blocca 
             from ".DB_NAME.".".ACCREDITAMENTO." where barcode = '$barcode'";
    $result=mysqli_query($dbc,$sql);
    $anagrafica=mysqli_fetch_array($result, MYSQLI_ASSOC);
    $nome = str_replace(" ","+",$anagrafica['nome']);
    $cognome = str_replace("'","&#039;",$anagrafica['cognome']);
    $nome = str_replace("'","&#039;",$nome);
    $cognome = str_replace(" ","+",$cognome);
    $nascita = $anagrafica['nascita'];
}


$numero = $_GET['numero'];
$numero1 = $_GET['numero1'];
$numero2 = $_GET['numero2'];

/*echo $numero .'<br />';
echo $numero1 .'<br />';
echo $numero2 .'<br />';*/

$numero10 = $numero*10;
$numero10 = $numero*$giococompleto->prezzo1;
$numero5 = $numero*$giococompleto->valore1;
$numero110 = $numero1*$giococompleto->prezzo2;
$numero15 = $numero1*$giococompleto->valore2;
$numero1110 = $numero2*$giococompleto->prezzo3;
$numero115 = $numero2*$giococompleto->valore3;
$totale = $numero5+$numero15+$numero115;
$totaleTOT = $numero + $numero1+ $numero2;


list($data, $ora) = explode(" ", date("Y-m-d H:i:s"));
$id_user = $_SESSION['user_id'];
//$id_user = SecurityManager::getLoggedInUser("uno")->userid;


/* Se il valore di "GIORNOCARNET"  all'interno della Tabella Concorso è diverso da zero controlla le vendite solo della giornata odierna   */
if ($giococompleto->giornocarnet != 0) 
{
    $controllobarcodeacquistati1 = Action::controlloBarcodeAcquistatiPeriodo ($barcode, $dbc);  
}
    
/*if ($giococompleto->giornocarnet==2) {
    $controllobarcodeacquistati1 = Action::controlloBarcodeAcquistatiOggi ($barcode);  
//    echo $controllobarcodeacquistati1;
}*/
else
{
    $controllobarcodeacquistati1 = Action::controllobarcodeacquistati ($barcode, $dbc); 
 
} 
    

$controllobarcodeacquistati = $controllobarcodeacquistati1->giocate;
$controllobarcodeacquistati1 = $controllobarcodeacquistati1->giocate1;
$controllobarcodeacquistati2 = $controllobarcodeacquistati1->giocate2;

/*echo '<h1>'; $controllobarcodeacquistati .'</h1><br />';
echo '<h1>'; $controllobarcodeacquistati1 .'</h1><br />';
echo '<h1>'; $controllobarcodeacquistati2 .'</h1><br />';*/


if ($giococompleto->max1) { $residui1 = $giococompleto->max1-$controllobarcodeacquistati;  $controlloresidui=null; }
if ($giococompleto->max2) { $residui2 = $giococompleto->max2-$controllobarcodeacquistati1;  $controlloresidui=null; }
if ($giococompleto->max3) { $residui3 = $giococompleto->max3-$controllobarcodeacquistati2;  $controlloresidui=null; }
if ($giococompleto->maxtot) { $residui = $giococompleto->maxtot-$controllobarcodeacquistati-$controllobarcodeacquistati1-$controllobarcodeacquistati2; $controlloresidui=1; }

/*
echo '<h1> MAX1 '.$giococompleto->max1 .'</h1><br />';
echo '<h1>MAX2 '. $giococompleto->max2 .'</h1><br />';
echo '<h1>MAX3 '. $giococompleto->max3 .'</h1><br />';





echo '<h1> Residui '. $residui1 .'</h1><br />';
echo '<h1> Residui1'. $residui2 .'</h1><br />';
echo '<h1> Residui2'. $residui .'</h1><br />';
die();

/*echo $giococompleto->max1 .'<br />';
echo $giococompleto->max2 .'<br />';
echo $giococompleto->max3 .'<br />';
die();*/



if ($controlloresidui) 
{
    if ($totaleTOT > $residui) 
    {

        if ($giococompleto->codbar) { ?>
            IL CODICE FISCALE <?=$barcode?> OGGI HA GIA' ACQUISTATO 
    <?php }else{ ?>
            IL BARCODE <?=$barcode?> OGGI HA GIA' ACQUISTATO 
    <?php } 

        if (!$controllobarcodeacquistati) echo "0"; else echo $controllobarcodeacquistati ?> <?=$giococompleto->carnet1?><br>
<?php   if ($giococompleto->carnet2) { ?>
<?php      if (!$controllobarcodeacquistati1) echo "0"; else echo $controllobarcodeacquistati1 ?>  <?=$giococompleto->carnet2?><br> 
    <?php } ?>

<?php if ($giococompleto->carnet3) { ?>
<?php if (!$controllobarcodeacquistati2) echo "0"; else echo $controllobarcodeacquistati2 ?>  <?=$giococompleto->carnet3?><br>
<?php } ?>
E PUO' ANCORA ACQUISTARE <?=$residui?> BUONI
<?php
die;
}
}else{ 



    if (($numero > $residui1) || ($numero1 > $residui2) || ($numero2 > $residui3)) 
    {
        if ($giococompleto->codbar) { ?>
            IL CODICE FISCALE <?=$barcode?> OGGI HA GIA' ACQUISTATO 
    <?php }
        else{ ?>
            IL BARCODE <?=$barcode?> OGGI HA GIA' ACQUISTATO 
    <?php } if (!$controllobarcodeacquistati) echo "0"; else echo $controllobarcodeacquistati; ?> <?=$giococompleto->carnet1?><br>
    <?php   if ($giococompleto->carnet2) { ?>
    <?php   if (!$controllobarcodeacquistati1) echo "0"; else echo $controllobarcodeacquistati1; ?>  <?=$giococompleto->carnet2?><br>
<?php } 

if ($giococompleto->carnet3) { ?>
<?php if (!$controllobarcodeacquistati2) echo "0"; else echo $controllobarcodeacquistati2; ?>  <?=$giococompleto->carnet3?><br>
<?php } ?>
E PUO' ANCORA ACQUISTARE <br>
<?=$residui1?> <?=$giococompleto->carnet1?><br>
<?php if ($giococompleto->carnet2) { ?>
<?=$residui2?> <?=$giococompleto->carnet2?><br>
<?php } ?>
<?php if ($giococompleto->carnet3) { ?>
<?=$residui2?> <?=$giococompleto->carnet3?><br>
<?php } 
die;
}
}
$time = date("H:i:s");
$sqlr3 = "SELECT numero, blocco, numero1, blocco1, numero2, blocco2
FROM ".DB_NAME.".".CARNET."
WHERE data = curdate( ) and 
(ora_inizio< '{$time}' and ora_fine > '{$time}' )";
    $resultr3=mysqli_query($dbc,$sqlr3);

/*     
echo '<h3>'. $sqlr3  .'</h3><br />';

die();*/


    $rdb_contar3= mysqli_fetch_array($resultr3, MYSQLI_ASSOC);  
    $sqlr = "select sum(carnet) as totale, sum(carnet1) as totale1, sum(carnet2) as totale2 from ".DB_NAME.".".VENDITA." where date(data_vendita)=curdate() ";
    $resultr=mysqli_query($dbc,$sqlr);
    $rdb_contar= mysqli_fetch_array($resultr, MYSQLI_ASSOC);
    
    
  

if ($rdb_contar['totale']>=$rdb_contar3['blocco'])
{
	$totalissimo = $rdb_contar3['numero']-$rdb_contar['totale'];
    if ($totalissimo == 0)
    { 
?>
    <strong>ATTENZIONE HAI VENDUTO TUTTI I <?=$giococompleto->carnet1?><br>

<?php 
    $numero = 0;
    }	 
?>
    <strong>ATTENZIONE RESTANO ANCORA <?=$totalissimo?>  <?=$giococompleto->carnet1?> ESCLUSI QUELLI IN VENDITA ADESSO<br />
    FINO ALLE ORE <?=date("H:i:s")?> HAI VENDUTO  <?=$rdb_contar['totale']?>  <?=$giococompleto->carnet1?></strong><br /><br />
<?php
}



if ($giococompleto->carnet2) 
{ 
    if ($rdb_contar['totale1']>=$rdb_contar3['blocco1'])
    {
	    $totalissimo1 = $rdb_contar3['numero1']-$rdb_contar['totale1'];	
        if ($totalissimo1 == 0)
        { 
?>
            <strong>ATTENZIONE HAI VENDUTO TUTTI I <?=$giococompleto->carnet2?><br>
<?php 
            $numero1 = 0;
        }	
?>

        <strong>ATTENZIONE RESTANO ANCORA <?=$totalissimo1?>  <?=$giococompleto->carnet2?> ESCLUSI QUELLI IN VENDITA ADESSO<br />
        FINO ALLE ORE <?=date("H:i:s")?> HAI VENDUTO <?=$rdb_contar['totale1']?>  <?=$giococompleto->carnet2?></strong><br /><br />
<?php
    }
}

if ($giococompleto->carnet3) 
{
    if ($rdb_contar['totale2']>=$rdb_contar3['blocco2'])
    {
	    $totalissimo2 = $rdb_contar3['numero2']-$rdb_contar['totale2'];
        if ($totalissimo2 == 0)
        { 
?>
            <strong>ATTENZIONE HAI VENDUTO TUTTI I <?=$giococompleto->carnet3?><br>
<?php 
            $numero2 = 0;
        }	
?>

    <strong>ATTENZIONE RESTANO ANCORA <?=$totalissimo2?>  <?=$giococompleto->carnet3?> ESCLUSI QUELLI IN VENDITA ADESSO<br />
    FINO ALLE ORE <?=date("H:i:s")?> HAI VENDUTO <?=$rdb_contar['totale2']?>  <?=$giococompleto->carnet3?></strong><br /><br />
<?php
    }
}

if ($giococompleto->stamparicevuta) 
{
?>
    <p><a class="btnPrint"  onClick="window.setTimeout('location.reload();', 5000)" target="_blank" href='../liberatorie/liberatoria_ricevuta.php?barcode=<?=$barcode?>&nome=<?=$nome?>&cognome=<?=$cognome?>&nascita=<?=$nascita?>&numero=<?=$numero?>&numero1=<?=$numero1?>&numero2=<?=$numero2?>&comune=<?=$comune?>&cap=<?=$cap?>'>ATTENZIONE!!!!! STAMPA LA RICEVUTA E COMPLETA LA VENDITA DEI BUONI</a></p>
<?php 
}else
{


                $query = "INSERT INTO ".DB_NAME.".".VENDITA." (
                        barcode,
                        nome,
                        cognome,
                        comune,
                        cap,
                        operatore,
                        carnet,
                        carnet1,
                        carnet2

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
                        '$numero2'

                        )";

    $result = mysqli_query($dbc,$query);
    $ricevuta = Action::ricevuta($dbc);  
}

    if ($giococompleto->codbar!= 1) { 
?>
        CODICE FISCALE <br><?=$barcode?><BR>
<?php }else{ ?>
    BARCODE <br><?=$barcode?><BR>
<?php } ?>
    NOME E COGNOME <br><?=$nome?> <?=$cognome?> <BR>
    DATA <?=$data?><BR>
    ORA <?=$ora?><BR>
    ACQUISTA NR. <?=$numero?> <?=$giococompleto->carnet1?><BR>
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


