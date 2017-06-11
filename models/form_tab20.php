<?php
$giococompleto = Action::ControlloCompleto();
?>
        
        <div id="tabs-20">
            
            <br><?php $tesserecomplessive = action::tesserecomplessive('N', 'M');
			$tesseracomplessiva = $tesserecomplessive->estrazione; ?>
            <?=$rdconcorso['card']?> inserite Nr <?=$tesseracomplessiva?> scarica <a href="excel/excel_completo.php">excel completo</a><br>
            <br><?php $tessereeliminate = action::tesserecomplessive('Y');
			$tesseraeliminata = $tessereeliminate->estrazione; ?>
             <?=$rdconcorso['card']?> eliminate Nr <?=$tesseraeliminata?> scarica <a href="excel/excel_completo.php?eliminata=Y">excel completo</a><br>
            <br><?php $tesseremodificate = action::tesserecomplessive('M');
			$tesseramodificata = $tesseremodificate->estrazione; ?>
            <?=$rdconcorso['card']?> modificate Nr <?=$tesseramodificata?> scarica <a href="excel/excel_completo.php?eliminata=M">excel completo</a><br>
            <br><?php $tesseresostituite = action::tesserecomplessive('S');
			$tesserasostituita = $tesseresostituite->estrazione; ?>
             <?=$rdconcorso['card']?> sostituite Nr <?=$tesserasostituita?> scarica <a href="excel/excel_completo.php?eliminata=S">excel completo</a><br>
			 <br><?php $tesseresostituite = action::tesserecomplessive('P');
			$tesserasostituita = $tesseresostituite->estrazione; ?>
             <?=$rdconcorso['card']?> provvisorie Nr <?=$tesserasostituita?> scarica <a href="excel/excel_completo.php?eliminata=P">excel completo</a><br>
			  <br><br>
			
			ESTRAZIONI
			<?PHP
			$query3="select * from ".DB_NAME.".".QUERY_ESTRAZIONE."";
			$result3 = mysql_query($query3) or die (mysql_error());
			while ($rdquery=mysql_fetch_array($result3)) { ?> 
			<form id="frm115">
			<input type="hidden" name="tipo_premio" id="tipo_premio" value="<?=$rdquery['nome']?>" />
                        <input type="hidden" name="id" id="id" value="<?=$rdquery['id']?>" />
                        <?php
                        $rdQueryTot = str_replace("&#039;","'",$rdquery['query']);
                        $query1=$rdQueryTot;
                        $result=mysql_query($query1) or die (mysql_error());
                        $rdb1=mysql_num_rows($result);
                        ?>
                        <br><a href="excel/excel_premio.php?id=<?=$rdquery['id']?>&tipo_premio=<?=$rdquery['tipo_premio']?>" target="_blank">Estrazione vincitori <?=$rdquery['nome']?></a> (Estrazione fra <?=$rdb1?> <?=$giococompleto->card?>) <input type="button" name="invio_115" id="invio_115" value="Visualizza Vincitori" />
			</form><br><br>
                        <?php } ?>
		    <div id="tableVincitori"></div>
			<br><br>
			REPORT SCARICABILI
			<?php
			$query3="select * from ".DB_NAME.".".QUERY."";
			$result3 = mysql_query($query3) or die (mysql_error());
			while ($rdquery=mysql_fetch_array($result3)) { ?> 
			<br><a href="excel/excel.php?id=<?=$rdquery['id']?>" target="_blank"><?=$rdquery['nome']?></a><br>
			<?php } ?>
			<br><br>
			<?php if ($giococompleto->voto) { ?>
			CLASSIFICA PV
			<?php
			$query3="select * from ".DB_NAME.".".QUERY."";
			$result3 = mysql_query($query3) or die (mysql_error());
			while ($rdquery=mysql_fetch_array($result3)) { ?> 
			<br><a href="excel/classifica_pdv.php" target="_blank">Classifica PDV</a><br>
			<?php } } ?>
			<br><br>
			<?php if ($giococompleto->uovo) { ?>
			CLASSIFICA UOVO
			<br><a href="excel/excel_uovo.php" target="_blank">Elenco Uova</a><br>
			<?php } ?>
	</div>
    
	