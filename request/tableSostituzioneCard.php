<?php 
session_start();
use Models\Action;


include('../inc/mysql.inc.php');

$giococompleto = Action::ControlloCompleto($dbc);
$query1="SELECT * FROM ".DB_NAME.".".ACCREDITAMENTO." WHERE barcode = '$_POST[barcode]'";
$result=mysqli_query($dbc,$query1);
$update=mysqli_fetch_array($result, MYSQLI_ASSOC);
?>



<form id="frm" method='post' action='../services/modificaTessera.php' enctype='multipart/form-data' onsubmit='return validateForm(this)'>
    <table width="100%" border="0">
        
  <tr>
    <td width="50%"><label for="s_barcode">Barcode</label></td>
    <td><input name="barcode_upd" type="hidden" value="<?=$update['barcode']?>"/><input name="barcode" type="text" class="required"  id="card" size="30" maxlength="18" onkeypress="return handleEnter(this, event)" value="<?=$update['barcode']?>"/></td>
    <input name="id_upd" type="hidden" value="<?=$update['id']?>"/><input name="id" type="hidden" class="required"  id="id" size="30" maxlength="18" value="<?=$update['id']?>"/>
  </tr>
  <tr>
    <td><label for="nome">Nome</label>		
</td>
    <td><input type="text" name="nome"  id="nome" class="required" size="30" onkeypress="return handleEnter(this, event)" value="<?=$update['nome']?>"/></td>
  </tr>
  <tr>
    <td><label for="cognome">Cognome</label>			
</td>
    <td><input type="text" name="cognome"  id="cognome" class="required" size="30" onkeypress="return handleEnter(this, event)" value="<?=$update['cognome']?>"/></td>
  </tr>
  <tr>
    <td><label for="indirizzo">Indirizzo</label>				
</td>
    <td><input type="text" name="indirizzo"  id="indirizzo" class="required" size="30" onkeypress="return handleEnter(this, event)" value="<?=$update['indirizzo']?>"/></td>
  </tr>
  <tr>
    <td><label for="civile">Numero Civico</label>				
</td>
    <td><input type="text" name="civico"  id="civico" class="required" size="30" onkeypress="return handleEnter(this, event)" value="<?=$update['civico']?>"/></td>
  </tr>
  <tr>
    <td><label for="comune">Citt&agrave;</label>	
</td>
    <td><input type="text" name="comune"  id="comune" class="required" size="30" onkeypress="return handleEnter(this, event)" value="<?=$update['comune']?>"/></td>
  </tr>
  <tr>
    <td><label for="cap">CAP</label>	
</td>
    <td><input type="text" name="cap"  id="cap" class="required" size="6" onkeypress="return handleEnter(this, event)" value="<?=$update['cap']?>"/></td>
  </tr>
  <tr>
    <td><label for="prv">Provincia</label>
</td>
    <td><input type="text" name="prv"  id="prv" class="required" size="2" onkeypress="return handleEnter(this, event)" value="<?=$update['provincia']?>"/></td>
  </tr>
 <?php if ($giococompleto->datanumero) { ?>
   <tr>
    <td><label for="nascita">Data di nascita</label>
</td>
    <td><input type="text" name="nascita"  id="nascita" class="required" size="11" onkeypress="return handleEnter(this, event)" value="<?=$update['nascita']?>"/></td>
  </tr>
 <?php }else{ ?>
   <tr>
    <td><label for="nascita">Data di nascita</label>
</td>
    <td><input type="text" name="nascita"  id="datepicker" class="required" size="11" onkeypress="return handleEnter(this, event)" value="<?=$update['nascita']?>"/></td>
  </tr>
 <?php } ?>
  <tr>
    <td><label for="sesso">Sesso</label>		

</td>
    <td><select name="sesso">
    <option value="<?=$update['sesso']?>" selected="selected"><?=$update['sesso']?></option>
    <option value="" >---Seleziona---</option>
    <option value="Uomo" >Uomo</option>
    <option value="Donna">Donna</option>
    </select></td>
  </tr>
  <tr>
    <td><label for="telefono">Telefono</label>			
</td>
    <td><input type="text" name="telefono"  id="telefono" class="required" size="30" onkeypress="return handleEnter(this, event)" value="<?=$update['telefono']?>"/></td>
  </tr>
  <tr>
    <td><label for="mobile">Cellulare</label>				
</td>
    <td><input type="text" name="mobile"  id="mobile" class="required" size="30" onkeypress="return handleEnter(this, event)" value="<?=$update['mobile']?>"/></td>
  </tr>
  <tr>
    <td><label for="email">Email</label>
</td>
    <td><input type="text" name="email"  id="email" class="required" size="30" onkeypress="return handleEnter(this, event)" value="<?=$update['email']?>"/></td>
  </tr>
  
  <tr>
    <td><label for="privacy">Consenso al trattamento dei dati personali (D.lgs. n.ro 196/03 e succ. mod.) 
</label></td><td>
<select name="privacy">
<option value="<?=$update['privacy']?>" selected="selected"><? if ($update['privacy']) echo "SI"; else echo "NO"; ?></option>
    <option value="" >---Seleziona---</option>
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
    <td><label for="privacy1">Consenso al trattamento dei dati personali ai fini pubblicitari
</label></td><td>
<select name="privacy1">
<option value="<?=$update['privacy2']?>" selected="selected"><? if ($update['privacy2']) echo "SI"; else echo "NO"; ?></option>
    <option value="" >---Seleziona---</option>
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
<input type="submit" name="modifica" id="modifica" value="MODIFICA" /></td>
  </tr>
</table>
		</form>




   

   




   

