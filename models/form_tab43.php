<?php $giococompleto = Action::ControlloCompleto(); ?>
<div id="tabs-43" >
    <form id="frm43" method='post' action='<?php  echo $_SERVER['PHP_SELF']; ?>' enctype='multipart/form-data' onsubmit='return validateForm(this)'>
    <table width="100%" border="0">
  <tr>
    <td width="50%"><label for="s_barcode43">Barcode</label></td>
    <td><input name="barcode43" type="text" class="required"  id="barcode43" size="30" maxlength="15" onkeypress="return handleEnter(this, event)" autofocus/></td>
  </tr>
  <tr>
    <td><label for="nome43">Nome</label>		
</td>
    <td><input type="text" name="nome43"  id="nome43" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="cognome43">Cognome</label>			
</td>
    <td><input type="text" name="cognome43"  id="cognome43" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="indirizzo43">Indirizzo</label>				
</td>
    <td><input type="text" name="indirizzo43"  id="indirizzo43" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
   <tr>
    <td><label for="civico43">Numero Civico</label>				
</td>
    <td><input type="text" name="civico43"  id="civico43" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="comune43">Comune</label>	
</td>
    <td><input type="text" name="comune43"  id="comune43" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="cap43">CAP</label>	
</td>
    <td><input type="text" name="cap43"  id="cap43" class="required" size="6" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="prv43">Provincia</label>
</td>
    <td><input type="text" name="prv43"  id="prv43" class="required" size="2" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <?php if ($giococompleto->datanumero) { ?>
   <tr>
    <td><label for="nascita43">Data di nascita</label>
</td>
    <td><input type="text" name="nascita43"  id="nascita43" class="required" size="11" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
 <?php }else{ ?>
   <tr>
    <td><label for="nascita43">Data di nascita</label>
</td>
    <td><input type="text" name="nascita43"  id="datepicker43" class="required" size="11" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
 <?php } ?>
  <tr>
    <td><label for="mobile43">Cellulare</label>				
</td>
    <td><input type="text" name="mobile43"  id="mobile43" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="email43">Email</label>
</td>
    <td><input type="text" name="email43"  id="email43" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
 <?php for ($i=0; $i<3; $i++)
		  { ?>
    <tr>
    <td><label for="figlio1">Figlio/a</label></td>
    <td>Nome: <input type="text" name="nomef[]"  id="nomef[]" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  	<td>Cognome: <input type="text" name="cognomef[]"  id="cognomef[]" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
    <td>Anno Nascita: <select name="nascitaf[]" id="nascitaf[]">
            <option value="">Scegli</option>  
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
         </select></td>
 </tr>
 <?php } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><label for="privacy43">Consenso al trattamento dei dati personali (D.lgs. n.ro 196/03 e succ. mod.) 
</label></td><td>
<select name="privacy43">
<option value="0" selected="selected">---Seleziona---</option>
    <option value="1">SI</option>
    <option value="0">NO</option>
    </select>
</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td><label for="privacy143">Consenso al trattamento dei dati personali ai fini pubblicitari
</label></td><td>
<select name="privacy143">
<option value="" selected="selected">---Seleziona---</option>
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
<input type="submit" name="invio43" id="invio43" value="Registra" /></td>
  </tr>
</table>
		</form>


	</div>