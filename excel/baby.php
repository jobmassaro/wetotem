<?php
	session_start();
	include('../inc/mysql.inc.php');


	$id_user = $_SESSION['user_id'];

    include('../inc/mysql.inc.php');

	$filename = "accessi.xls";
	
	if(stristr($_SERVER['HTTP_USER_AGENT'], 'ipad') OR stristr($_SERVER['HTTP_USER_AGENT'],'iphone') OR stristr($_SERVER['HTTP_USER_AGENT'], 'ipod')) 
		header("Content-Type: application/octet-stream"); 
	else
		header('Content-Type: application/vnd.ms-excel'); 
	header("Content-Disposition: attachment; filename=\"$filename\"");
	
	echo "<br />Accessi<br />";
	$query1="
	SELECT 
		date( data ) as Data,
		SUM( orario_ingresso ) as Accessi 
	FROM 
		". ".".ACCESSO."
	WHERE 
		settore = 'BabyParking'
	GROUP BY 
		date( data )
	";
	$result = mysqli_query($dbc,$query1);

	while ($rdb=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		// ----- togli gli slash dal record

		foreach ($rdb as $name => $value)
		{
			if (!is_numeric($name))
			{
				$rdb["$name"] = trim($rdb["$name"]); 
				$rdb["$name"] = stripslashes($rdb["$name"]);
			}
		}



		// ----- stampa intestazioni tabella

		if (!$i)
		{
			$i=0;
			echo '
				<table border="0">
					<tr align="left">
			';
			foreach ($rdb as $name => $value)
				if (!is_numeric($name))
					echo '<td style="font-weight:bold; font-family:Tahoma">'.$name.'</td> ';
			echo '</tr>';
		}

		// ----- stampa righe tabella 
		?>
		<tr valign="middle" align="left"> 
		<td style="text-transform:uppercase"><?=$rdb['Data']?></td>
		<td style="text-transform:uppercase"><?=$rdb['Accessi']?></td>

		<?php
		$i++;
	}

	?> 
	</table> 