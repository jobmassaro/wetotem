<?php
$giococompleto = Action::ControlloCompleto();
?>
<div id="tabs-32" >
    <form id="frm32" method='post' action='<?php  echo $_SERVER['PHP_SELF']; ?>' enctype='multipart/form-data' onsubmit='return validateForm(this)'>
   <table width="100%" border="0">
      
  <tr>
 <?php if ($giococompleto->codbar) { ?>
  <td><label for="s_barcode32">Codice Fiscale</label></td>
  <?php }else{ ?>
    <td width="50%"><label for="s_barcode32">Barcode</label></td>
    <?php } ?>
    <td><input name="barcode32" type="text" class="required"  id="barcode32" size="30" maxlength="20" onkeypress="return handleEnter(this, event)" autofocus/></td>
  </tr>
  <tr>
    <td><label for="nome32">Nome</label>		
</td>
    <td><input type="text" name="nome32"  id="nome32" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="cognome32">Cognome</label>			
</td>
    <td><input type="text" name="cognome32"  id="cognome32" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
 
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><label for="privacy32">Consenso al trattamento dei dati personali (D.lgs. n.ro 1932/03 e succ. mod.) 
</label></td><td>
<select name="privacy32">
<option value="0" selected="selected">---Seleziona---</option>
    <option value="1">SI</option>
    <option value="0">NO</option>
    </select>
</td>
  </tr>

</table>
<table width="100%" border="0">

  
  <tr>
    <td>
    <br />
<input type="submit" name="invio_prov" id="invio_prov" value="Registra" /></td>
  </tr>
</table>
		</form>


	</div>