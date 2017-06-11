<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/leisole/2016/conf/configuration.php");
	$view = '';
	$credito = 0;
	$textPremi = '';
	
	$today 	= date('Y-m-d');
	$ora	= date('H:i:s');

	$connessione = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if ($connessione->connect_errno) {
		echo "Connessione fallita: ". $connessione->connect_error . ".";
		exit();
	}
	
	// Cliente
	$cliente = isset($_GET['cliente']) ? $_GET['cliente'] : null;
	if (isset($cliente))
	{
		if ($result = $connessione->query("SELECT * FROM ".newgiocata." WHERE cliente = '$cliente' AND `risultato`='VINTO' AND `ritirato` = 'F'")) if ($obj = $result->fetch_object()) $textPremi = "<p class='label'><b>Hai un premio da ritirare all'infopoint!</b></p>";
		if ($result = $connessione->query("SELECT SUM(credito) AS credito, SUM(usato) AS usato FROM ".newcredito." WHERE cliente = '$cliente'")) {
			$obj 	= $result->fetch_object();
			if (!isset($obj->credito)) $view = 'ERROR';
			else
			{
				$credito = $obj->credito - $obj->usato;
				if (!$credito) $view = 'CREDIT';
			}
		}
	}
	else $view = 'LOOP';
	// Cliente
	
	// Giornata
	if ($result = $connessione->query("SELECT * FROM ".newgiornata." WHERE `data` = DATE('$today') AND TIME('$ora') > `inizio` AND TIME('$ora') < `fine` LIMIT 1")) { 
        if ($obj 	= $result->fetch_object())
		{
			$inizio		=	$obj->inizio; 
			$fine		=	$obj->fine; 
		}
		else
		{
			$view = 'END';
		}	
    }
	
	if ($view == '')
	{
		$inizio = new DateTime(date('H:i', strtotime($inizio)));
		$fine 	= new DateTime(date('H:i', strtotime($fine))); 
		$ora 	= new DateTime(date('H:i'));
		
		$trascorsi 	= ($inizio->diff($ora)->h * 60) 	+ $inizio->diff($ora)->i;
		$range 		= ($inizio->diff($fine)->h * 60) 	+ $inizio->diff($fine)->i;
		$rimanenti 	= ($ora->diff($fine)->h * 60) 		+ $ora->diff($fine)->i;
		// Giornata
		
		// Premi
		if ($result = $connessione->query("SELECT SUM(tot) AS tot, SUM(usciti) AS usciti FROM ".newpremi." WHERE `data` = DATE('$today')")) { 
			if ($obj 	= $result->fetch_object())
			{
				$premiVinti	=	$obj->usciti; 
				$premiTOT	=	$obj->tot;
			}
			else
			{
				// exit('Premi mancanti.');
			}	
		}
		// Premi
		if ($premiTOT)
		{
			// Fasce
			$fasceMin 	= 	(($inizio->diff($fine)->h * 60) + $inizio->diff($fine)->i) / $premiTOT;
			$fasceN		= 	ceil($trascorsi/$fasceMin);
			$fasceMin = floor($fasceMin);
			
			$fasceInizio 	= new DateTime(date($inizio->format('Y-m-d H:i')));
			$fasceInizio 	= $fasceInizio->add(new DateInterval('PT' . abs($fasceMin*($fasceN-1)) . 'M'));
			
			$fasceFine 		= new DateTime(date($fasceInizio->format('Y-m-d H:i')));
			$fasceFine 		= $fasceFine->add(new DateInterval('PT' . $fasceMin . 'M'));
			
			$fasceTrascorsi 	= ($fasceInizio->diff($ora)->h * 60) 		+ $fasceInizio->diff($ora)->i;
			$fasceRange 		= ($fasceInizio->diff($fasceFine)->h * 60) 	+ $fasceInizio->diff($fasceFine)->i;
			$fasceRimanenti 	= ($ora->diff($fasceFine)->h * 60) 			+ $ora->diff($fasceFine)->i;
			// Fasce
			
			
			$probFinale = 20;
			$probIniziale = 1;
			
			$premi = $fasceN - $premiVinti;
			
			// Estrazione
			$incremento = ($probFinale - $probIniziale) / ($fasceRange);
			$prob = intval(($probIniziale + ($incremento * $fasceTrascorsi))*$premi);
			if ((($ora->diff($fine)->h * 60) + $ora->diff($fine)->i) < 30) $prob = 50*$premi;
			if (mt_rand(1,100) <= $prob) $vinto = true; else $vinto = false;
			// Estrazione
			
			$connessione->query("UPDATE ".newcredito." SET `usato` = `usato` + 1 WHERE cliente = '$cliente' AND credito > usato LIMIT 1");
			if ($cliente == '55842') $vinto = false;
			if ($cliente == '19262') $vinto = false;
			if ($vinto)
			{
				$sql = 
				"
				SELECT id, nome 
				FROM
				(
					SELECT id,data, nome, tot, usciti
					FROM ".newpremi." p JOIN
					(
						SELECT a.N + b.N * 10 + 1 n
						FROM 
						(SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) a,
						(SELECT 0 AS N UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) b
					) n
					ON n.n <= p.tot-p.usciti
					WHERE data = DATE('$today')
				) x
				ORDER BY RAND() LIMIT 1
				";
				
				//if ($result = $connessione->query("SELECT id, nome FROM ".newpremi." WHERE `data` = DATE('$today') AND `tot` > `usciti` ORDER BY RAND() LIMIT 1")) { 
				if ($result = $connessione->query($sql)) { 
					if ($obj 	= $result->fetch_object())
					{
						$premioId	=	$obj->id; 
						$premioNome	=	$obj->nome;
					}
				}
				$connessione->query("UPDATE ".newpremi." SET `usciti` = `usciti` + 1 WHERE id = $premioId");
				$connessione->query("INSERT INTO ".newgiocata." (cliente, risultato, premio) VALUES ('$cliente','VINTO','$premioNome')");
				$view = 'WIN';
			}
			else
			{
				$connessione->query("INSERT INTO ".newgiocata." (cliente, risultato) VALUES ('$cliente','PERSO')");
				$view = 'LOSE';
			}
		}
	}
	
	$credito--; //Credito dopo l'estrazione
	//if ($result = $connessione->query("SELECT nome FROM ".accreditamento." WHERE cod = '$cliente'")) if ($obj = $result->fetch_object()) $cliente = $obj->nome;
	if ($result = $connessione->query("SELECT nome FROM ".ACCREDITAMENTO." WHERE barcode = '$cliente'")) if ($obj = $result->fetch_object()) $cliente = $obj->nome;
	switch ($view)
	{
		case 'WIN': 
			$body = 
			"
			<body>
				<p id='totemCrediti' class='label'>Crediti: <b>$credito</b></p>
				<p id='totemUser' class='label'>Ciao <b>$cliente</b></p>
				<div id='totemPremi'>$textPremi</div>
				<video id='win' width='100%' autoplay>
					<source src='media/win.mp4' type='video/mp4'>
					Il tuo browser non supporta i video HTML5.
				</video>

				<script> document.getElementById('win').onended = function(e) { refresh(); }; </script>
			</body>
			";
			break;
		case 'LOSE': 
			$body = 
			"
			<body>
				<p id='totemCrediti' class='label'>Crediti: <b>$credito</b></p>
				<p id='totemUser' class='label'>Ciao <b>$cliente</b></p>
				<div id='totemPremi'>$textPremi</div>
				<video id='lose' width='100%' autoplay>
					<source src='media/lose.mp4' type='video/mp4'>
					Il tuo browser non supporta i video HTML5.
				</video>

				<script> document.getElementById('lose').onended = function(e) { refresh(); }; </script>
			</body>
			";
			break;
		case 'END': 
			$body = 
			"
			<body>
				<img src='media/end.jpg' width='100%'>

				<script> setTimeout(refresh, 5000);</script>
			</body>
			"; 
			break;
		case 'CREDIT': 
			$body = 
			"
			<body>
				<img src='media/credit.jpg' width='100%'>

				<script> setTimeout(refresh, 5000);</script>
			</body>
			"; 
			break;
		case 'ERROR': 
			$body = 
			"
			<body>
				<img src='media/error.jpg' width='100%'>

				<script> setTimeout(refresh, 5000);</script>
			</body>
			";
			break;
		default:
			$body = 
			"
			<body onkeydown=\"document.getElementById('cliente').focus();\">
				<form> <input id='cliente' name='cliente' type='text' autocomplete='off' /> </form>

				<video id='loop' width='100%' autoplay>
					<source src='media/loop.mp4' type='video/mp4'>
					Il tuo browser non supporta i video HTML5.
				</video>
				
				<script> var loop = 1; document.getElementById('loop').onended = function(e) {if (loop == 6) refresh(); loop++; this.play();}; </script>
			</body>
			";
		//loop
	$connessione->close();
	}
?>
<!DOCTYPE html> 
<html ondragstart='return false;' onselectstart='return false;' oncontextmenu='return false;'>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<style>
		body{margin:0;cursor:none;overflow:hidden;}
		form
		{
			position:absolute;
			top:-50px;
		}
		.label
		{
			letter-spacing: 3px;
			color: #0089D0; //#c78825;
			background-color: #fed165;
			text-shadow: 
				2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 
				1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;
			padding: 10px;
			font-size:3vw; 
			border: 5px solid white;
		}
		#totemCrediti
		{
			position:absolute; 
			right:30px; 
		}
		#totemUser
		{
			position:absolute; 
			left:30px; 
		}
		#totemPremi
		{
			width:100%;
			text-align:center;	
			position:absolute; 
			bottom:0;
		}
	</style>
</head>
<script>function refresh(){window.location = window.location.href.split("?")[0];} </script>
<?=$body?>
</html>
