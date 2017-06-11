 <?php
$giococompleto = Action::ControlloCompleto();
?>
         	 <div id="tabs-7">
<form id="frm7">
			
						<table width="100%" border="0">
<tr>
    <td><label for="barcode7">Barcode</label></td>
<td><input type="text" name="barcode7"  id="barcode7" class="required" size="11" /></td></tr>
<tr><td><label for="nome_bambino">Nome bimbo</label></td>
<td><input type="text" name="nome_bambino"  id="nome_bambino" class="required" size="11" /></td></tr>
<tr><td><label for="cognome_accompagnatore">Cognome bimbo</label></td>
<td><input type="text" name="cognome_accompagnatore"  id="cognome_accompagnatore" class="required" size="11" /></td></tr>
<tr><td><label for="eta_bambino">Et&agrave; bimbo</label></td>
<td><input type="text" name="eta_bambino"  id="eta_bambino" class="required" size="3" /></td></tr>
<tr><td><label for="accessi7">Accessi conteggiati finora: </label></td>
<?php $babycomplessive = action::AccessiComplessive (0);
$babycomplessiva = $babycomplessive->id; ?>
<td><?=$babycomplessiva?></td></tr></table>
<table width="100%" border="0">
<tr>
    <td>
    <br />
<input type="button" name="invio7" id="invio7" value="Ingresso" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
	</form>
	<div id="tableBabyparking"></div>
Dati Accessi<br><br>  
            <form id="frm80">
    
      <table width="100%" border="0">
        
        <tr><td>Data inizio:</td>
           <td> <input type="text" name="data_inizio" id="datepicker81" onkeypress="return handleEnter(this, event)"/></td>
        </tr>
        <tr><td>Data fine:</td>
           <td> <input type="text" name="data_fine" id="datepicker82" onkeypress="return handleEnter(this, event)"/><input type="hidden" name="settore80" id="settore80" value="0"/></td>
        </tr>
      </table>
      <table width="100%" border="0">
  <tr>
    <td>
    <br />
<input type="button" name="invio80" id="invio80" value="Invia" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
	</form><br><br>
<br>
	<br><?php $tesserebaby = action::tesserebaby();
$tesserababy = $tesserebaby->estrazione; ?>
            <?=$giococompleto->card?> inserite Nr <?=$tesserababy?> scarica <a href="excel/excel_baby.php?settore=0">excel completo</a><br>
        <div id="tableExcel"></div>
		
	</div>	