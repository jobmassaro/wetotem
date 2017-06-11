	<div id="tabs-3">
	
    <form id="frm3">
        
    <table width="100%" border="0">
<tr>
    <td>	
	
  <?php 
	if ($giococompleto->codbar)  
		echo '<label for="barcode3">Barcode</label></td><td>';
	else
		echo '<label for="barcode3">Codice Fiscale</label></td><td>';
  ?>
	
<input type="text" name="barcode3"  id="barcode3" size="11" onkeypress="return handleEnter(this, event)" autofocus/></td>
<tr>
    <td>
	<label for="cognome3">Cognome </label></td><td>
<input type="text" name="cognome3"  id="cognome3" size="11" onkeypress="return handleEnter(this, event)"/>
</td></tr></table>
<table width="100%" border="0">
<tr>
    <td>
    <br />
<input type="button" name="invio3" id="invio3" value="Ricerca" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
		</form>
		<div id="tableTessera"></div>
		
	</div>