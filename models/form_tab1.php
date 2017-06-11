 <?php
$giococompleto = Action::ControlloCompleto();
?>
<div id="tabs-1">

    <form id="frm1">
    
      <table width="100%" border="0">
        <tr>
          <td><label for="barcode1">Barcode </label></td>
          <td><input type="text" name="barcode1"  id="barcode1" size="11" onkeypress="return handleEnter(this, event)" autofocus/></td>
        </tr>
        <tr>
          <td> Esercizio:</td>
            <td><select name="esercizio1" id="esercizio1">
              <option value="">Scegli...</option>
              <?php
			  $concorsi = Action::getEsercizio();
if ($concorsi) {
	foreach($concorsi as $c){
	if ($c) {
		?>
 <option value="<?=$c->id?>"><?=$c->insegna?></option>
 <?php } } } ?> 
            </select></td></tr>
            <tr><td>Importo:</td>
           <td> <input type="text" name="importo1" id="importo1" onkeypress="return handleEnter(this, event)"/></td>
        </tr>
        <tr><td>Numero Scontrino:</td>
           <td> <input type="text" name="numero1" id="numero1" onkeypress="return handleEnter(this, event)"/></td>
        </tr>
        <tr><td>Data emissione:</td>
           <td> <input type="text" name="data1" id="datepicker50" onkeypress="return handleEnter(this, event)"/></td>
        </tr>
		<?php if ($giococompleto->voto) { ?>
		 <tr><td>Voto Punto Vendita:</td>
           <td> <select name="voto1" id="voto1">
              <option value="">Scegli...</option>
			  <?php for ($i=1;$i<=10;$i++) { ?>
			 <option value="<?=$i?>"><?=$i?></option>
			 <?php } ?> 
            </select></td>
        </tr>
		<?php } ?>
      </table>
      <table width="100%" border="0">
  <tr>
    <td>
    <br />
<input type="button" name="invio1" id="invio1" value="Registra Scontrini" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
	</form><br>
    <div id="tableScontrini"></div>
		
  </div>