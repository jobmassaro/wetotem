<div id="tabs-35" >
    <form id="frm35" method='post' action='<?php  echo $_SERVER['PHP_SELF']; ?>' enctype='multipart/form-data' onsubmit='return validateForm(this)'>
   <table width="100%" border="0">
      
  <tr>
    <td width="50%"><label for="s_barcode35">Barcode</label></td>
    <td><input name="barcode35" type="text" class="required"  id="barcode35" size="30" maxlength="15" onkeypress="return handleEnter(this, event)" autofocus/></td>
  </tr>
  <tr>
    <td><label for="nome35">Nome</label>		
</td>
    <td><input type="text" name="nome35"  id="nome35" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="cognome35">Cognome</label>			
</td>
    <td><input type="text" name="cognome35"  id="cognome35" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="eta35">Eta</label>				
</td>
    <td><select name="eta35" id="eta35">
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
  <tr>
    <td><label for="nomePM">Nome Padre/Madre</label>		
</td>
    <td><input type="text" name="nomePM"  id="nomePM" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="cognomePM">Cognome Padre/Madre</label>			
</td>
    <td><input type="text" name="cognomePM"  id="cognomePM" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
     <tr>
    <td><label for="mobile35">Cellulare</label>				
</td>
    <td><input type="text" name="mobile35"  id="mobile35" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
  <tr>
    <td><label for="email35">Email</label>
</td>
    <td><input type="text" name="email35"  id="email35" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
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
    <td><label for="privacy35">Consenso al trattamento dei dati personali (D.lgs. n.ro 1932/03 e succ. mod.) 
</label></td><td>
<select name="privacy35">
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
<input type="submit" name="invio_bam" id="invio_bam" value="Registra" /></td>
  </tr>
</table>
		</form>


	</div>