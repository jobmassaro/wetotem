<?php 

    use Models\User;
    session_start();
    include('../inc/mysql.inc.php');


	$data = $_GET['data'];
	
	$query="
		SELECT 
			count(*) as ingressi
		FROM 
			".DB_NAME.".".ACCREDITAMENTO." 
		WHERE 
			date(data)='$data'";
	$result=mysqli_query($dbc,$query);
    echo '<br><table>';
	while ($rdb=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$ingressi = $rdb['ingressi'];
		echo "<tr><td><b>Nuovi accrediti: </b></td><td>$ingressi</td></tr>";
	}
	echo '</table><br>';
	//-----------------------------------------------------------------------PRENDI DATI DA DB E STAMPA
	
	$query1="
		SELECT 
			data as Data, 
			barcode as Barcode, 
			settore as Settore, 
			orario_ingresso as Persone 
		FROM 
			".DB_NAME.".".ACCESSO." 
		WHERE 
			date(data)='$data'";
    
	$result=mysqli_query($dbc,$query1);
	$totPersone = 0;
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
				<table width="80%" cellpadding="5" border="1" bordercolor="#E0E0E0">
					<tr align="left">
			';
			foreach ($rdb as $name => $value)
				if (!is_numeric($name))
					echo '<td style="font-weight:bold; font-family:Tahoma">'.$name.'</td>';
			echo '</tr>';
		}

		// ----- stampa righe tabella 
		?>
		<tr valign="middle" align="left" <?php if ($i%2 == false) { ?> bgcolor="#fcffc7" <?php } else { ?> bgcolor="#fefff3" <?php }; ?>>	
		<td style="text-transform:uppercase"><?=$rdb['Data']?></td>
		<td style="text-transform:uppercase"><?=$rdb['Barcode']?></td> 
		<td style="text-transform:uppercase"><?=$rdb['Settore']?></td>
		<td style="text-transform:uppercase"><?=$rdb['Persone']?></td>
		
		<?php
		$totPersone += $rdb['Persone'];
		$i++;
	}
	?>
	<tr><td><?=$data?></td><td>-</td><td>-</td><td><?=$totPersone?></td></tr>
	</table> 
</div>