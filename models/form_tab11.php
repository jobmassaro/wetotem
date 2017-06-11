<div id="tabs-11">
<?php $giococompleto = Action::ControlloCompleto(); ?>
  
       Inserisci Numero Scontrini presentati: 
       <select name="numsco" id="numsco">
              <option value="">Scegli...</option>
      <?php for ($k=1;$k<=$giococompleto->numscontrini;$k++) { ?>     
 <option value="<?=$k?>"><?=$k?></option>
<?php } ?>
            </select>
      barcode: <input type="text" name="barcode11"  id="barcode11" size="11" onkeypress="return handleEnter(this, event)" autofocus/>
      <table width="100%" border="0">
        <tr>
            <td width="20%"><label for="Barcode111">Barcode </label> </td>
          <td width="20%"><label for="Esercizio111">Esercizio </label> </td>
          <td width="20%"><label for="Importo111">Importo </label></td>
		  <td width="20%"><label for="Numero111">Numero </label></td>
		  <td width="20%"><label for="Data111">Data </label></td>
         </table>
       <br>
        <div id="tableNumScontrini"></div>
       
     
   
  </div>