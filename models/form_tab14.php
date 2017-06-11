<div id="tabs-14">
<form id="frm14">
        
    <table width="100%" border="0">
<tr>
    <td>
<?php if ($giococompleto->codbar) { ?>	
	<label for="barcode14">Barcode</label></td><td>
	<?php }else{ ?>
	<label for="barcode14">Codice Fiscale</label></td><td>
	<?php } ?>
<input type="text" name="barcode14"  id="barcode14" onkeypress="return handleEnter(this, event)" autofocus/></td>
</tr>
<tr>
    <td>	
	<label for="cognome4">Cognome</label></td><td>
<input type="text" name="cognome14"  id="cognome14" onkeypress="return handleEnter(this, event)" autofocus/></td>
</tr>
</table>
<table width="100%" border="0">
<tr>
    <td>
    <br />
<input type="button" name="invio14" id="invio14" value="Ricerca" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
		</form>
		<div id="tableCarnet"></div>
		
  </div>