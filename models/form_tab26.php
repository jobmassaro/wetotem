	<div id="tabs-26">
	<br><br>
	<?php $query7="select id from ".DB_NAME.".".ATTRAZIONE."";
$result7 = mysql_query($query7) or die (mysql_error());
while ($rdattrazioni7=mysql_fetch_array($result7)) { 
	$queryeta="select nascita from ".DB_NAME.".".CLASSIFICA." group by nascita order by nascita ASC";
	$resulteta = mysql_query($queryeta) or die (mysql_error());
	while ($rdeta=mysql_fetch_array($resulteta)) {
	?> 
	<a href="classifica.php?settore=<?=$rdattrazioni7['id']?>&eta=<?=$rdeta['nascita']?>" target="_blank">VEDI CLASSIFICA <?=$rdattrazioni1['id']?> <?=$rdeta['nascita']?></a><br>
	<?php } } ?>
	<br><br>
    <form id="frm26">
        
    <table width="100%" border="0">
<tr>
    <td>	
	<label for="barcode26">Codice Fiscale </label></td><td>
<input type="text" name="barcode26"  id="barcode26" size="11" onkeypress="return handleEnter(this, event)" autofocus/></td>
<tr>
    <td>
	<label for="cognome26">Cognome </label></td><td>
<input type="text" name="cognome26"  id="cognome26" size="11" onkeypress="return handleEnter(this, event)"/>
</td></tr>
<tr> <td><label for="ingressi26">Attrazione
</label></td><td>
<select name="ingressi26" id="ingressi26">
    <option value="" selected="selected">--- Seleziona ---</option>
      <?php $query4="select * from ".DB_NAME.".".ATTRAZIONE."";
$result4 = mysql_query($query4) or die (mysql_error());
while ($rdattrazioni=mysql_fetch_array($result4)) { ?>     
    <option value="<?=$rdattrazioni['id']?>"><?=$rdattrazioni['nome']?></option>
    <?php }?>
    </select></td></tr>
</table>
<table width="100%" border="0">
<tr>
    <td>
    <br />
<input type="button" name="invio26" id="invio26" value="Ricerca" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
		</form>
		<div id="tableClaPunt"></div>
		
	</div>