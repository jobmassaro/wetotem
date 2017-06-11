<?php

class concorsi {

      function card()
	{
	$id_user = SecurityManager::getLoggedInUser("uno")->userid;
        $level_user = SecurityManager::getLoggedInUser("uno")->user_level;
	if ($_POST['barcode']) {
	if ($_POST['quesito1']) {
	$query = "INSERT INTO ".DB_NAME.".".ACCREDITAMENTO." (
barcode,
nome,
cognome,
indirizzo,
civico,
comune,
cap,
provincia,
nascita,
sesso,
telefono,
email,
mobile,
privacy,
privacy2,
operatore,
eliminata,
quesito1,
quesito2,
quesito3,
quesito4,
quesito5
)
VALUES (
'".$_POST['barcode']."',  
'".str_replace("'","&#039;",$_POST['nome'])."', 
'".str_replace("'","&#039;",$_POST['cognome'])."', 
'".str_replace("'","&#039;",$_POST['indirizzo'])."', 
'".$_POST['civico']."', 
'".str_replace("'","&#039;",$_POST['comune'])."', 
'".$_POST['cap']."', 
'".$_POST['prv']."', 
'".$_POST['nascita']."', 
'".$_POST['sesso']."', 
'".$_POST['telefono']."', 
'".$_POST['email']."', 
'".$_POST['mobile']."',
'".$_POST['privacy']."', 
'".$_POST['privacy1']."',
'$id_user',
'N',
'".$_POST['quesito1']."',
'".$_POST['quesito2']."',
'".$_POST['quesito3']."',
'".$_POST['quesito4']."',
'".$_POST['quesito5']."'
)"; 
}else{
$query = "INSERT INTO ".DB_NAME.".".ACCREDITAMENTO." (
barcode,
nome,
cognome,
indirizzo,
civico,
comune,
cap,
provincia,
nascita,
sesso,
telefono,
email,
mobile,
privacy,
privacy2,
operatore,
eliminata
)
VALUES (
'".$_POST['barcode']."',
'".str_replace("'","&#039;",$_POST['nome'])."',
'".str_replace("'","&#039;",$_POST['cognome'])."',
'".str_replace("'","&#039;",$_POST['indirizzo'])."',
'".$_POST['civico']."',
'".str_replace("'","&#039;",$_POST['comune'])."',
'".$_POST['cap']."',
'".$_POST['prv']."',
'".$_POST['nascita']."',
'".$_POST['sesso']."',
'".$_POST['telefono']."',
'".$_POST['email']."',
'".$_POST['mobile']."',
'".$_POST['privacy']."',
'".$_POST['privacy1']."',
'$id_user',
'N'
)"; 
}
	$result = mysql_query($query) or die (mysql_error());
	
	?>
		   <script>
		   alert("REGISTRAZIONE AVVENUTA CON SUCCESSO")
		   </script>
	       <?php
	   }

	}
	
	function figli()
	{
		$id_user = SecurityManager::getLoggedInUser("uno")->userid;
		$level_user = SecurityManager::getLoggedInUser("uno")->user_level;
if ($_POST['barcode43']) {
$query = "INSERT INTO ".DB_NAME.".".ACCREDITAMENTO." (
cf,
barcode,
nome,
cognome,
indirizzo,
civico,
comune,
cap,
provincia,
nascita,
sesso,
telefono,
email,
mobile,
privacy,
privacy2,
operatore,
eliminata,
quesito1,
quesito2,
quesito3,
quesito4,
quesito5
)
VALUES (
'".$_POST['cf43']."',			
'".$_POST['barcode43']."',
'".str_replace("'","&#039;",$_POST['nome43'])."',
'".str_replace("'","&#039;",$_POST['cognome43'])."',
'".str_replace("'","&#039;",$_POST['indirizzo43'])."',
'".$_POST['civico43']."',
'".str_replace("'","&#039;",$_POST['comune43'])."',
'".$_POST['cap43']."',
'".$_POST['prv43']."',
'".$_POST['nascita43']."',
'".$_POST['sesso43']."',
'".$_POST['telefono43']."',
'".$_POST['email43']."',
'".$_POST['mobile43']."',
'".$_POST['privacy43']."',
'".$_POST['privacy143']."',
	'$id_user',
	'F',
	'".$_POST['quesito1']."',
'".$_POST['quesito2']."',
'".$_POST['quesito3']."',
'".$_POST['quesito4']."',
'".$_POST['quesito5']."'
)";
			$result = mysql_query($query) or die (mysql_error());
	
	  
$nomef = $_POST['nomef'];
$cognomef = $_POST['cognomef'];
$nascitaf = $_POST['nascitaf'];

for ($i=0; $i<3; $i++)
	{
if ($cognomef[$i]) {
$query1 = "INSERT INTO ".DB_NAME.".".FIGLI." (
barcode,
nome,
cognome,
nascita,
email,
mobile
)
VALUES (
'".$_POST['barcode43']."',
'$nomef[$i]',
'$cognomef[$i]',
'$nascitaf[$i]',
'".$_POST['email43']."',
'".$_POST['mobile43']."'
)";
 $result = mysql_query($query1) or die (mysql_error());
		}
	} 
	
	
	?>
			   <script>
			   alert("REGISTRAZIONE AVVENUTA CON SUCCESSO")
			   </script>
		       <?php
}
		   
	
}
      
              function upd_card()
	{
         $id_user = SecurityManager::getLoggedInUser("uno")->userid;
	$level_user = SecurityManager::getLoggedInUser("uno")->user_level;
	if ($_POST['barcode'] != $_POST['barcode_upd']) {
	
	$query_sostituzione = "UPDATE ".DB_NAME.".".ACCREDITAMENTO." set eliminata = 'S' where barcode = '".$_POST['barcode_upd']."'";
	$result_sostituzione = mysql_query($query_sostituzione) or die (mysql_error());
	$query_sostituzione1 = "UPDATE ".DB_NAME.".".CLASSIFICA." set barcode = '".$_POST['barcode']."' where barcode = '".$_POST['barcode_upd']."'";
	$result_sostituzione = mysql_query($query_sostituzione1) or die (mysql_error());
	$query_sostituzione2 = "UPDATE ".DB_NAME.".".GIOCATA." set barcode = '".$_POST['barcode']."' where barcode = '".$_POST['barcode_upd']."'";
	$result_sostituzione = mysql_query($query_sostituzione2) or die (mysql_error());
	$query_sostituzione3 = "UPDATE ".DB_NAME.".".SCONTRINO." set barcode = '".$_POST['barcode']."' where barcode = '".$_POST['barcode_upd']."'";
	$result_sostituzione = mysql_query($query_sostituzione3) or die (mysql_error());
	
$query = "insert into ".DB_NAME.".".ACCREDITAMENTO." (
barcode,
nome, 
cognome, 
indirizzo,
civico,
comune,
cap,
provincia,
nascita,
sesso, 
telefono, 
email,
mobile,
privacy,
privacy2,
operatore,
eliminata,
quesito1,
quesito2,
quesito3,
quesito4,
quesito5) 
values 
('".$_POST['barcode']."',
'".str_replace("'","&#039;",$_POST['nome'])."', 
'".str_replace("'","&#039;",$_POST['cognome'])."', 
'".str_replace("'","&#039;",$_POST['indirizzo'])."',
'".$_POST['civico']."',  
'".str_replace("'","&#039;",$_POST['comune'])."', 
'".$_POST['cap']."',
'".$_POST['prv']."',
'".$_POST['nascita']."',
'".$_POST['sesso']."', 
'".$_POST['telefono']."', 
'".$_POST['email']."',
'".$_POST['mobile']."',
'".$_POST['privacy']."',
'".$_POST['privacy1']."',
'$id_user',
'N',
'".$_POST['quesito1']."',
'".$_POST['quesito2']."',
'".$_POST['quesito3']."',
'".$_POST['quesito4']."',
'".$_POST['quesito5']."'
)";
	$result = mysql_query($query) or die (mysql_error()); ?>
	<script>
	   alert("SOSTITUZIONE AVVENUTA CON SUCCESSO")
	   </script>
	<?php
        } else {
        
$query = "UPDATE ".DB_NAME.".".ACCREDITAMENTO." set 
nome = '".str_replace("'","&#039;",$_POST['nome'])."', 
cognome = '".str_replace("'","&#039;",$_POST['cognome'])."', 
indirizzo = '".str_replace("'","&#039;",$_POST['indirizzo'])."', 
civico = '".$_POST['civico']."',
comune = '".str_replace("'","&#039;",$_POST['comune'])."', 
cap = '".$_POST['cap']."',
provincia = '".$_POST['prv']."',
nascita = '".$_POST['nascita']."',
sesso = '".$_POST['sesso']."', 
telefono = '".$_POST['telefono']."', 
email = '".$_POST['email']."',
mobile = '".$_POST['mobile']."',
privacy = '".$_POST['privacy']."',
privacy2 = '".$_POST['privacy1']."',
operatore = '$id_user',
eliminata = 'M',
quesito1 = '".$_POST['quesito1']."',
quesito2 = '".$_POST['quesito2']."',
quesito3 = '".$_POST['quesito3']."',
quesito4 = '".$_POST['quesito4']."',
quesito5 = '".$_POST['quesito5']."'
where barcode = '".$_POST['barcode_upd']."'";
	$result = mysql_query($query) or die (mysql_error());
		
	   ?>
	   <script>
	   alert("MODIFICA AVVENUTA CON SUCCESSO")
	   </script>
       <?php
		}

	}
	
	function card_prov()
	{
	$id_user = SecurityManager::getLoggedInUser("uno")->userid;
        $level_user = SecurityManager::getLoggedInUser("uno")->user_level;
	if ($_POST['barcode32']) {
	$query = "INSERT INTO ".DB_NAME.".".ACCREDITAMENTO." (
barcode,
nome,
cognome,
indirizzo,			
civico,
comune,
privacy,
operatore,
eliminata
)
VALUES (
'".$_POST['barcode32']."',  
'".$_POST['nome32']."', 
'".$_POST['cognome32']."', 
'".$_POST['indirizzo32']."', 
'".$_POST['civico32']."',
'".$_POST['comune32']."', 
'".$_POST['privacy32']."', 
'$id_user',
'P'
)";
	$result = mysql_query($query) or die (mysql_error());
	
	?>
		   <script>
		   alert("REGISTRAZIONE AVVENUTA CON SUCCESSO")
		   </script>
	       <?php
	   }
	
	} 
	
	function card_bamb()
	{
		$id_user = SecurityManager::getLoggedInUser("uno")->userid;
		$level_user = SecurityManager::getLoggedInUser("uno")->user_level;
		if ($_POST['barcode35']) {
			$query = "INSERT INTO ".DB_NAME.".".FIGLI." (
barcode,
nome,
cognome,
nascita,
email,
mobile
)
VALUES (
'".$_POST['barcode35']."',
'".$_POST['nome35']."',
'".$_POST['cognome35']."',
'".$_POST['eta35']."',
'".$_POST['email35']."', 
'".$_POST['mobile35']."'
	)";
			$result = mysql_query($query) or die (mysql_error());
			?>
					   <script>
					   alert("REGISTRAZIONE AVVENUTA CON SUCCESSO")
					   </script>
				       <?php
		   }
		
		} 

	function perizia()
	{
		$id_user = SecurityManager::getLoggedInUser("uno")->userid;
		$level_user = SecurityManager::getLoggedInUser("uno")->user_level;
			$query = "INSERT INTO ".DB_NAME.".".PERIZIA." (
promotrice,
soggetto,
area,
durata,
destinatari,
tipologia,
modalita,
centro,
data
)
VALUES (
'".$_POST['promotriceper']."',
'Societ&agrave; WORLD EVENT S.r.l. con sede in Torino Via Bionaz 40/9, Registro delle Imprese di Torino R.E.A. 1062665, C.F. e P.IVA n. 09568100011.',
'".$_POST['areaper']."',
'".$_POST['durataper']."',
'I consumatori titolari della ',
'Di sorte',
'".$_POST['modalitaper']."',
'".$_POST['centroper']."',
'".$_POST['dataper']."'
	)";
			$result = mysql_query($query) or die (mysql_error());

?>
		   <script>
		   alert("REGISTRAZIONE PERIZIA AVVENUTA CON SUCCESSO")
		   </script>
	       <?php
	
		}
		
		function upd_card_figli()
		{
$id_user = SecurityManager::getLoggedInUser("uno")->userid;
$level_user = SecurityManager::getLoggedInUser("uno")->user_level;
if ($_POST['barcode'] != $_POST['barcode_upd']) {
		
$query_sostituzione = "UPDATE ".DB_NAME.".".ACCREDITAMENTO." set eliminata = 'S' where barcode = '".$_POST['barcode_upd']."'";
$result_sostituzione = mysql_query($query_sostituzione) or die (mysql_error());
$query_sostituzione1 = "UPDATE ".DB_NAME.".".CLASSIFICA." set barcode = '".$_POST['barcode']."' where barcode = '".$_POST['barcode_upd']."'";
$result_sostituzione = mysql_query($query_sostituzione1) or die (mysql_error());
$query_sostituzione2 = "UPDATE ".DB_NAME.".".FIGLI." set barcode = '".$_POST['barcode']."', email = '".$_POST['email']."', mobile = '".$_POST['mobile']."'  where barcode = '".$_POST['barcode_upd']."'";
$result_sostituzione = mysql_query($query_sostituzione2) or die (mysql_error());
		
$query = "insert into ".DB_NAME.".".ACCREDITAMENTO." (
barcode,
nome,
cognome,
indirizzo,
civico,
comune,
cap,
provincia,
nascita,
email,
mobile,
privacy,
privacy2,
operatore,
eliminata)
values
('".$_POST['barcode']."',
'".str_replace("'","&#039;",$_POST['nome'])."',
'".str_replace("'","&#039;",$_POST['cognome'])."',
'".str_replace("'","&#039;",$_POST['indirizzo'])."',
'".$_POST['civico']."',
'".str_replace("'","&#039;",$_POST['comune'])."',
'".$_POST['cap']."',
'".$_POST['prv']."',
'".$_POST['nascita']."',
'".$_POST['email']."',
'".$_POST['mobile']."',
'".$_POST['privacy']."',
'".$_POST['privacy1']."',
'$id_user',
'F'
)";
$result = mysql_query($query) or die (mysql_error()); 

if ($_POST['figlisi'] == 'TRUE')
{
	$querysi = " select count(barcode) as id from ".DB_NAME.".".FIGLI." where barcode = '".$_POST['barcode']."'";
	$resultsi = mysql_query($querysi) or die (mysql_error());
	$update=mysql_fetch_array($resultsi);
	$restanti = 3 - $update['id'];
	
	$nomef = $_POST['nomef'];
	$cognomef = $_POST['cognomef'];
	$nascitaf = $_POST['nascitaf'];
	
	for ($i=0; $i<$restanti; $i++)
	{
		if ($cognomef) {
			$query1 = "INSERT INTO ".DB_NAME.".".FIGLI." (
barcode,
nome,
cognome,
nascita,
email,
mobile
)
VALUES (
'".$_POST['barcode']."',
	'$nomef[$i]',
	'$cognomef[$i]',
	'$nascitaf[$i]',
	'".$_POST['email']."',
'".$_POST['mobile']."'
)";
			$result = mysql_query($query1) or die (mysql_error());
} } }
?>
<script>
alert("SOSTITUZIONE AVVENUTA CON SUCCESSO")
</script>
<?php
} else {
		        
		$query = "UPDATE ".DB_NAME.".".ACCREDITAMENTO." set 
		nome = '".str_replace("'","&#039;",$_POST['nome'])."', 
		cognome = '".str_replace("'","&#039;",$_POST['cognome'])."', 
		indirizzo = '".str_replace("'","&#039;",$_POST['indirizzo'])."', 
		civico = '".$_POST['civico']."',
		comune = '".str_replace("'","&#039;",$_POST['comune'])."', 
		cap = '".$_POST['cap']."',
		provincia = '".$_POST['prv']."',
		nascita = '".$_POST['nascita']."',
		email = '".$_POST['email']."',
		mobile = '".$_POST['mobile']."',
		privacy = '".$_POST['privacy']."',
		privacy2 = '".$_POST['privacy1']."',
		operatore = '$id_user',
		eliminata = 'F'
		where barcode = '".$_POST['barcode_upd']."'";
			$result = mysql_query($query) or die (mysql_error());
			
			if ($_POST['figlisi'] == 'TRUE')
			{
				$querysi = "select count(barcode) as id from ".DB_NAME.".".FIGLI." where barcode = '".$_POST['barcode_upd']."'";
				$resultsi = mysql_query($querysi) or die (mysql_error());
				$update=mysql_fetch_array($resultsi);
				$restanti = 3 - $update['id'];
			
				$nomef = $_POST['nomef'];
				$cognomef = $_POST['cognomef'];
				$nascitaf = $_POST['nascitaf'];
			
				for ($i=0; $i<$restanti; $i++)
				{
					if ($cognomef[$i]) {
					$query1 = "INSERT INTO ".DB_NAME.".".FIGLI." (
					barcode,
					nome,
					cognome,
					nascita,
					email,
					mobile
					)
					VALUES (
					'".$_POST['barcode_upd']."',
					'$nomef[$i]',
					'$cognomef[$i]',
					'$nascitaf[$i]',
					'".$_POST['email']."',
					'".$_POST['mobile']."'
					)";
						$result = mysql_query($query1) or die (mysql_error());
					} } }
			
			   ?>
			   <script>
			   alert("MODIFICA AVVENUTA CON SUCCESSO")
			   </script>
		       <?php
				}
		
			}
		
		
}

?>
