 <?php

    use Models\Action;



    include('../inc/mysql.inc.php');

$cfg['player_host'] = "10.0.0.2";
$cfg['player_port'] = "8080";
$cfg['player_pass'] = "sasa";


function vlc($command, $win) 
{
    global $cfg;
  
  /*  $request  = 'GET /requests/playlist.xml?command=pl_play&id=6'. ' HTTP/1.1' . "\r\n";
    $request .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
    $request .= 'Connection: Close' . "\r\n";
    $request .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";


  $request2  = 'GET /requests/status.xml?command=pl_loop'.' HTTP/1.1' . "\r\n";
    $request2 .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
    $request2 .= 'Connection: Close' . "\r\n";
    $request2 .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";
*/

    


    
    
 
   


    //@fwrite($soket, $request) or die();
    if($win == 1 )
    {
		$request2  = 'GET /requests/status.xml?command=pl_play&id=10'.' HTTP/1.1' . "\r\n";
		$request2 .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
		$request2 .= 'Connection: Close' . "\r\n";
		$request2 .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";




		 $soket2 = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();
        @fwrite($soket2, $request2) or die();
		  //$content2 = stream_get_contents($soket2);
		 fclose($soket2);
       
        
    }else if($win == 0)
    {

    	$request2  = 'GET /requests/status.xml?command=pl_play&id=9'.' HTTP/1.1' . "\r\n";
		$request2 .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
		$request2 .= 'Connection: Close' . "\r\n";
		$request2 .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";




		 $soket2 = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();
        @fwrite($soket2, $request2) or die();
		  //$content2 = stream_get_contents($soket2);
		 fclose($soket2);


    }
    
    if($win ==10)
	{

		
 	   $request3  = 'GET /requests/status.xml?command=pl_play&id=8'.' HTTP/1.1' . "\r\n";
    	$request3 .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
    	$request3 .= 'Connection: Close' . "\r\n";
    	$request3 .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";

    
     $soket3 = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();


		 @fwrite($soket3, $request3) or die();
		   //$content3 = stream_get_contents($soket3);
		    fclose($soket3);
	}

    


    //content = stream_get_contents($soket);
  
  
    
     //$soket = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();

    //$content = stream_get_contents($soket);
    
      
    
    
    
    //fclose($soket);
   
    //fclose($soket3);
	
    $temp = explode("\r\n\r\n", $content, 2);
    if (isset($temp[1])) 
	{
        $header = $temp[0];
        $content = $temp[1];
    }
    
    return $content;
}






//echo("<pre>" . vlc2("pl_loop") . "</pre>");





























	$view = '';
	$credito = 0;
	$textPremi = '';
	
	$today 	= date('Y-m-d');
	$ora	= date('H:i:s');

    if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$cliente = $_GET['cliente'];
		if ($result = $dbc->query("SELECT * FROM ".newgiocata." WHERE cliente = '$cliente' AND `risultato`='VINTO' AND `ritirato` = 'F'")) 
		    if ($obj = $result->fetch_object()) 
			{
				$textPremi = "<p class='label'><b>Hai un premio da ritirare all'infopoint!</b></p>"; 
			
			}
				
			//echo "SELECT SUM(credito) AS credito, SUM(usato) AS usato FROM ".newcredito." WHERE cliente = '$cliente'";

		if ($result = $dbc->query("SELECT SUM(credito) AS credito, SUM(usato) AS usato FROM ".newcredito." WHERE cliente = '$cliente'")) 
		{
				
			
			$obj = $result->fetch_object();


			

			if (!isset($obj->credito)) 
				$view = 'ERROR';
			else
			{
				$credito = $obj->credito - $obj->usato;
				if ($credito == 0) 
					$view = 'CREDIT';
					
			}
		}
	}
	else 
        $view = 'LOOP';
    
	
	// Cliente
	
	// Giornata
	/*$sql = "SELECT * FROM ".newgiornata." WHERE `data` = DATE('$today') AND TIME('$ora') > `inizio` AND TIME('$ora') < `fine` LIMIT 1";
	echo $sql;*/

	
	if ($result = $dbc->query("SELECT * FROM ".newgiornata." WHERE `data` = DATE('$today') AND TIME('$ora') > `inizio` AND TIME('$ora') < `fine` LIMIT 1")) 
    {
		
        if ($obj 	= $result->fetch_object())
		{
		
			$inizio		=	$obj->inizio; 
			$fine		=	$obj->fine; 
		
		}
	else
		
			$view = 'END';
			

	
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

		//echo "SELECT SUM(tot) AS tot, SUM(usciti) AS usciti FROM ".newpremi." WHERE `data` = DATE('$today')";
		
		
		if ($result = $dbc->query("SELECT SUM(tot) AS tot, SUM(usciti) AS usciti FROM ".newpremi." WHERE `data` = DATE('$today')")) 
		{ 
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
		
		//echo $premiVinti .'<br />';
		//echo $premiTOT .'<br />';

		//die();
    	if ($premiTOT)
		{
			//echo $premiTOT .'<br />';
			// Fasce
			$fasceMin 	= 	(($inizio->diff($fine)->h * 60) + $inizio->diff($fine)->i) / $premiTOT;
			$fasceN		= 	ceil($trascorsi/$fasceMin);
			$fasceMin = floor($fasceMin);
			
			$fasceInizio 	= new DateTime(date($inizio->format('Y-m-d H:i')));
			$fasceInizio 	= $fasceInizio->add(new DateInterval('PT' . abs($fasceMin*($fasceN-1)) . 'M'));
		
			$fasceFine 		= new DateTime(date($fasceInizio->format('Y-m-d H:i')));
			$fasceFine 		= $fasceFine->add(new DateInterval('PT' . $fasceMin . 'M'));

			//fasceTrascorsi = minuti trascorsi nella fascia attuale 
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
			$probpercentuale = $probIniziale + ($incremento * $fasceTrascorsi);
			$random = mt_rand(1,5);
			if ((($ora->diff($fine)->h * 60) + $ora->diff($fine)->i) < 30) $prob = 50*$premi;
			if ($random <= $prob) $vinto = true; else $vinto = false;
			// Estrazione
			
            //insert into log estrazione 

			/*echo $h;
			echo $m;*/

			

                $sql ="INSERT INTO " .LOG_ESTRAZIONI." 
                    (
                        DATA,
                        K,
                        PERCENTUALETOTALE,
                        PROBPERCENTUALE,
                        FASCIACORRENTE,
                        RANDOM,
                        MINUTOATTUALE,
                        INC_PERC_AL_MIN,
                        DURFASCIA,
                        TTRASCORSO,
                        TOTPREMI ) 
                        VALUES 
                        (
                            NOW(),
                             {$premi},
                            '{$prob}',
                            '{$probpercentuale }',
                            '{$fasceN}',
                            '{$random}',
                            '{$fasceTrascorsi}',
                            '{$incremento}',
                            '{$fasceMin}',
                            '{$trascorsi}',
                            '{$premiTOT}')";
                            
						
						
                    $result = $dbc->query($sql);
            
            //

			$dbc->query("UPDATE ".newcredito." SET `usato` = `usato` + 1 WHERE cliente = '$cliente' AND credito > usato LIMIT 1");
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
				if($fasceN == 1)
				{
					$sql = "SELECT id,nome FROM ".newpremi." WHERE data = DATE('$today') LIMIT 1";
						
				}
				if ($result = $dbc->query($sql)) 
				{ 
					if ($obj 	= $result->fetch_object())
					{
						$premioId	=	$obj->id; 
						$premioNome	=	$obj->nome;
					}
				}

				$dbc->query("UPDATE ".newpremi." SET `usciti` = `usciti` + 1 WHERE id = $premioId");
				$dbc->query("INSERT INTO ".newgiocata." (cliente, risultato, premio) VALUES ('$cliente','VINTO','$premioNome')");
				$view = 'WIN';
			}
			else
			{
				$dbc->query("INSERT INTO ".newgiocata." (cliente, risultato) VALUES ('$cliente','PERSO')");
				$view = 'LOSE';
			}
		}
	}
	
    $credito--; //Credito dopo l'estrazione
	//if ($result = $connessione->query("SELECT nome FROM ".accreditamento." WHERE cod = '$cliente'")) if ($obj = $result->fetch_object()) $cliente = $obj->nome;

	if ($result = $dbc->query("SELECT nome FROM ".ACCREDITAMENTO." WHERE barcode = '$cliente'")) 
		if ($obj = $result->fetch_object()) $cliente = $obj->nome;

		

	switch ($view)
	{
		case 'WIN': 

		if($premioNome==='GIFT CARD 50')
		{
			echo("<pre>" . vlc("pl_loop",1) . "</pre>");
			
			$body = 
			"
			<body class='container'>
				<p id='totemCrediti' class='label'>Crediti: <b>$credito</b></p>
				<p id='totemUser' class='label'>Ciao <b>$cliente</b></p>
				<div id='totemPremi'>$textPremi</div>
				<video id='win' width='100%' autoplay>
					<source src='http://10.0.0.10/totem/media/win.mp4' type='video/mp4'>
					Il tuo browser non supporta i video HTML5.
				</video>
				
				<script> 
				setTimeout(function () {
   					window.location.href = '../';
					}, 10000) </script>
			</body>	";

		}else{
			echo("<pre>" . vlc("pl_loop",1) . "</pre>");
		
		$body = 
			"
			<body class='container'>
				<p id='totemCrediti' class='label'>Crediti: <b>$credito</b></p>
				<p id='totemUser' class='label'>Ciao <b>$cliente</b></p>
				<div id='totemPremi'>$textPremi</div>
				<video id='win' width='100%' autoplay>
					<source src='http://10.0.0.10/totem/media/win.mp4' type='video/mp4'>
					Il tuo browser non supporta i video HTML5.
				</video>
				
				<script> 
				setTimeout(function () {
   					window.location.href = '../';
					}, 10000) </script>
			</body>	";
		}
					
			break;
		case 'LOSE': 

		
		echo("<pre>" . vlc("pl_loop",0) . "</pre>");
		
			
		$body = 
			"
			<body class='container'>
				<p id='totemCrediti' class='label'>Crediti: <b>$credito</b></p>
				<p id='totemUser' class='label'>Ciao <b>$cliente</b></p>
				<div id='totemPremi'>$textPremi</div>
				<video id='win' width='100%' autoplay>
					<source src='http://10.0.0.10/totem/media/lose.mp4' type='video/mp4'>
					Il tuo browser non supporta i video HTML5.
				</video>
				
				<script> 
				setTimeout(function () {
   					window.location.href = '../';
					}, 10000) </script>
			</body>	";
			
		
			break;
		case 'END': 
			header('location:../' );
			/*$body = 
			"
			<body>
				<img src='media/end.jpg' width='100%'>

				<script> setTimeout(refresh, 5000);</script>
			</body>
			"; 
			break;*/
		case 'CREDIT': 
		//	header('location:../' );
			$body = 
			"
			<body>
				<img src='../dist/videos/nocredit.jpg' width='100%'>

				<script> setTimeout(refresh, 10000);</script>
			</body>
			<script> 
				setTimeout(function () {
   					window.location.href = '../';
					}, 10000) </script>
			";
			break;
		case 'ERROR': 
			$body = "
			<body>
				<img src='../dist/videos/error.jpg' width='100%'>
			</body>
			<script> 
				setTimeout(function () {
   					window.location.href = '../';
					}, 10000) </script>
			";
			
			break;

		default:
		
			header('location:../' );
		/*	$body = 
			"
			<body onkeydown=\"document.getElementById('cliente').focus();\">
				<form> <input id='cliente' name='cliente' type='text' autocomplete='off' /> </form>

				<video id='loop' width='100%' autoplay>
					<source src='media/loop.mp4' type='video/mp4'>
					Il tuo browser non supporta i video HTML5.
				</video>
				
				<script> var loop = 1; document.getElementById('loop').onended = function(e) {if (loop == 6) refresh(); loop++; this.play();}; </script>
			</body>
			";*/
		//loop

	$dbc->close();
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

        div {
            width: 400px;
            height: 200px;
            border: 1px dotted;
        }

	</style>
     
</head>
<script>function refresh(){window.location = window.location.href.split("?")[0];} </script>
<?=$body?>
</html>
