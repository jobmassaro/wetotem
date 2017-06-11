 <?php
$giococompleto = Action::ControlloCompleto();
?>
 <div id="tabs-8">
	<form id="frm8">
			
						<table width="100%" border="0">
<?php 
  if ($giococompleto->nomebar) { ?>
  <tr>
    <td><label for="cognome13">Cognome</label>			
</td>
    <td><input type="text" name="cognome8"  id="cognome8" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
   <?php }else{ ?>  
 <tr>
          <td><label for="barcode13">Barcode</label></td>
          <td><input type="text" name="barcode8"  id="barcode8"  onkeypress="return handleEnter(this, event)" autofocus/></td>
        </tr>
	  <?php } ?>
   <tr> <td><label for="ingressi8">Attrazione
</label></td><td>
<select name="ingressi8" id="ingressi8">
    <option value="0" selected="selected">--- Seleziona ---</option>
      <?php $query4="select * from ".DB_NAME.".".ATTRAZIONE." where tempo = 0";
$result4 = mysql_query($query4) or die (mysql_error());
while ($rdattrazioni=mysql_fetch_array($result4)) { ?>     
    <option value="<?=$rdattrazioni['id']?>"><?=$rdattrazioni['nome']?></option>
    <?php }?>
    </select></td></tr>
<tr>
<td><label for="numero8">Numero Ingressi Adulti</label></td>
<td><input type="text" name="numero81"  id="numero81" class="required" size="11" /></td></tr>
<tr>
<td><label for="numero81">Numero Ingressi Bambini</label></td>
<td><input type="text" name="numero8"  id="numero8" class="required" size="11" /></td></tr>
</table>
<table width="100%" border="0">
<tr>
    <td>
    <br />
<input type="button" name="invio8" id="invio8" value="Ingresso" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
	</form>
	<?php $query5="select * from ".DB_NAME.".".ATTRAZIONE." where tempo = 0";
$result5 = mysql_query($query5) or die (mysql_error());
while ($rdattrazioni1=mysql_fetch_array($result5)) { ?> 
	<br><?=$rdattrazioni1['nome']?>
	<?php $attrazioni = action::attrazioni($rdattrazioni1['id']); ?><br>
            Ingressi Bambini Nr <?=$attrazioni->numero?> <br>
			Ingressi Adulti Nr <?=$attrazioni->numero1?> <br>
			scarica <a href="excel/excel_accessi.php?settore=<?=$rdattrazioni1['id']?>">excel completo</a><br><br>
	<?php } ?>
	<div id="tableIngressiVari"></div>
     </div>