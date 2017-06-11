<?php 
use Models\Action;

session_start();

include('../inc/mysql.inc.php');


?>
<div ng-controller="nuovaTesseraCtrl">
    <form id="frm" enctype='multipart/form-data' onsubmit='return validateForm(this)' >
    <table width="100%" border="0">
 
  <tr>
  <?php 
	if ($giococompleto->codbar)  
		echo '<td width="50%"><label for="s_barcode">Barcode</label></td>';
	else
		echo '<td width="50%"><label for="s_barcode">Codice Fiscale</label></td>';
  ?>
    <td><input name="card" type="hidden" id="card" value="0"/>
    <input name="barcode" type="text" class="required"  id="barcode" size="30" maxlength="16" ng-model="item.barcode" autofocus placeholder="barcode..codice fiscale"/></td>
  </tr>
  <tr>
    <td><label for="nome">Nome</label>		
</td>
    <td><input type="text" name="nome"  id="nome" class="required" size="30"  ng-model="item.nome" placeholder="nome"/></td>
  </tr>
  <tr>
    <td><label for="cognome">Cognome</label>			
</td>
    <td><input type="text" name="cognome"  id="cognome" class="required" size="30" onkeypress="return handleEnter(this, event)" ng-model="item.cognome" placeholder="cognome"/></td>
  </tr>
  <tr>
    <td><label for="indirizzo">Indirizzo</label>				
</td>
    <td><input type="text" name="indirizzo"  id="indirizzo" class="required" size="30" onkeypress="return handleEnter(this, event)" ng-model="item.indirizzo" placeholder="indirizzo"/></td>
  </tr>
   <tr>
    <td><label for="civile">Numero Civico</label>				
</td>
    <td><input type="text" name="civico"  id="civico" class="required" size="30" onkeypress="return handleEnter(this, event)" ng-model="item.civico" placeholder="civico"/></td>
  </tr>
  <tr>
    <td><label for="comune">Comune</label>	
</td>
    <td><input type="text" name="comune"  id="comune" class="required" size="30" onkeypress="return handleEnter(this, event)" ng-model="item.comune" placeholder="comune"/></td>
  </tr>
  <tr>
    <td><label for="cap">CAP</label>	
</td>
    <td><input type="text" name="cap"  id="cap" class="required" size="6" onkeypress="return handleEnter(this, event)" ng-model="item.cap" placeholder="cap"/></td>
  </tr>
  <tr>
    <td><label for="prv">Provincia</label>
</td>
    <td><input type="text" name="prv"  id="prv" class="required" size="2" onkeypress="return handleEnter(this, event)" ng-model="item.prv" placeholder="provincia"/></td>
  </tr>
  <?php if ($giococompleto->datanumero) { ?>
   <tr>
    <td><label for="nascita">Data di nascita</label>
</td>
    <td><input type="text" name="nascita"  id="nascita" class="required" size="11" onkeypress="return handleEnter(this, event)" ng-model="item.nascita" placeholder="nascita" required/></td>
  </tr>
 <?php }else{ ?>
   <tr>
    <td><label for="nascita">Data di nascita</label>
</td>
    <td><input type="text" name="nascita"  id="datepicker" class="required" size="11" onkeypress="return handleEnter(this, event)" ng-model="item.nascita" placeholder="nascita" required/></td>
  </tr>
 <?php } ?>
  <tr>
    <td><label for="sesso">Sesso</label>		

</td>
    <td>
      <select ng-model="item.sesso"  name="sesso" required>
        <option value="" selected="selected">---Seleziona---</option>
        <option value="Uomo">Uomo</option>
        <option value="Donna">Donna</option>
      </select>
    </td>
  </tr>
  <tr>
    <td><label for="telefono">Telefono</label>			
</td>
    <td><input type="text" name="telefono"  id="telefono" class="required" size="30" onkeypress="return handleEnter(this, event)" ng-model="item.telefono" placeholder="telefono" required/></td>
  </tr>
  <tr>
    <td><label for="mobile">Cellulare</label>				
</td>
    <td><input type="text" name="mobile"  id="mobile" class="required" size="30" onkeypress="return handleEnter(this, event)" ng-model="item.mobile" placeholder="mobile" /></td>
  </tr>
  <tr>
    <td><label for="email">Email</label>
</td>
    <td><input type="email" name="email"  id="email" class="required" size="30" onkeypress="return handleEnter(this, event)" ng-model="item.email" placeholder="email" required/></td>
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
    <td><label for="privacy">Consenso al trattamento dei dati personali (D.lgs. n.ro 196/03 e succ. mod.) 
</label>
</td>
<td>
  <select name="privacy" ng-model="item.privacy" convert-to-number name="privacy" ng-init="item.privacy=0" required>
    <option value="0" selected="selected">NO</option>
    <option value="1">SI</option>
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
  <select ng-model="item.privacy1" convert-to-number name="privacy1" required ng-init="item.privacy1=0">
    <option value="0" selected="selected">NO</option>
    <option value="1" >SI</option>
  </select>
</td>
  </tr>
</table>
<table width="100%" border="0">

  
  <tr>
    <td>
    <br />
<input type="submit" name="invio" id="invio" value="Registra" class="btn btn-primary btn-lg" ng-click="nuovaTessera(item)"/></td>
  </tr>
</table>
		</form>
</div>



<!--- ABBIAMO COMMENTATO LA SEZIONE QUESITI -->

   <?php 
   /*if ($giococompleto->quesito) { 
   	$quesitocompleto = Action::ControlloQuesito();
   	if ($quesitocompleto->domanda1) {
   	?>
   	<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td><label for="quesito1"><?=$quesitocompleto->domanda1?></label></td>
    <?php 
    $quesitocompleto_select = Action::ControlloQuesito_select(1);
    if ($quesitocompleto_select->valore) { ?>
    <td>
			<select name="quesito1" id="quesito1">
    		<option value="" selected="selected">--- Seleziona ---</option>
      		<?php $queryd1="select selezione from ".DB_NAME.".".QUESITO_SELECT." where domande=1";
			$resultd1 = mysqli_query($dbc,$queryd1);
			while ($d1=mysqli_fetch_array($resultd1,MYSQLI_ASSOC)) { ?>     
    		<option value="<?=$d1['selezione']?>"><?=$d1['selezione']?></option>
   	 		<?php }?>
    		</select>
    </td>
    <?php }else{?>
    <td><input type="text" name="quesito1"  id="quesito1" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
    <?php } ?>
  </tr>
  <?php } if ($quesitocompleto->domanda2) { ?>
   <tr>
    <td><label for="quesito2"><?=$quesitocompleto->domanda2?></label></td>
     <?php 
    $quesitocompleto_select = Action::ControlloQuesito_select(2);
    if ($quesitocompleto_select->valore) { ?>
    <td>
			<select name="quesito2" id="quesito2">
    		<option value="" selected="selected">--- Seleziona ---</option>
      		<?php $queryd2="select selezione from ".DB_NAME.".".QUESITO_SELECT." where domande=2";
			$resultd2 = mysql_query($queryd2) or die (mysql_error());
			while ($d2=mysql_fetch_array($resultd2)) { ?>     
    		<option value="<?=$d2['selezione']?>"><?=$d2['selezione']?></option>
   	 		<?php }?>
    		</select>
    </td>
    <?php }else{?>
    <td><input type="text" name="quesito2"  id="quesito2" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  <?php } ?>
  </tr>
  <?php } if ($quesitocompleto->domanda3) { ?>
   <tr>
    <td><label for="quesito3"><?=$quesitocompleto->domanda3?></label></td>
     <?php 
    $quesitocompleto_select = Action::ControlloQuesito_select(3);
    if ($quesitocompleto_select->valore) { ?>
    <td>
			<select name="quesito3" id="quesito3">
    		<option value="" selected="selected">--- Seleziona ---</option>
      		<?php $queryd3="select selezione from ".DB_NAME.".".QUESITO_SELECT." where domande=3";
			$resultd3 = mysql_query($queryd3) or die (mysql_error());
			while ($d3=mysql_fetch_array($resultd3)) { ?>     
    		<option value="<?=$d3['selezione']?>"><?=$d3['selezione']?></option>
   	 		<?php }?>
    		</select>
    </td>
    <?php }else{?>
    <td><input type="text" name="quesito3"  id="quesito3" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
    <?php } ?>
  </tr>
  <?php } if ($quesitocompleto->domanda4) { ?>
   <tr>
    <td><label for="quesito4"><?=$quesitocompleto->domanda4?></label></td>
     <?php 
    $quesitocompleto_select = Action::ControlloQuesito_select(4);
    if ($quesitocompleto_select->valore) { ?>
    <td>
			<select name="quesito4" id="quesito4">
    		<option value="" selected="selected">--- Seleziona ---</option>
      		<?php $queryd4="select selezione from ".DB_NAME.".".QUESITO_SELECT." where domande=4";
			$resultd4 = mysql_query($queryd4) or die (mysql_error());
			while ($d4=mysql_fetch_array($resultd4)) { ?>     
    		<option value="<?=$d4['selezione']?>"><?=$d4['selezione']?></option>
   	 		<?php }?>
    		</select>
    </td>
    <?php }else{?>
    <td><input type="text" name="quesito4"  id="quesito4" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
 <?php } ?>
  </tr>
  <?php } if ($quesitocompleto->domanda5) {?>
   <tr>
    <td><label for="quesito5"><?=$quesitocompleto->domanda5?></label></td>
     <?php 
    $quesitocompleto_select = Action::ControlloQuesito_select(5);
    if ($quesitocompleto_select->valore) { ?>
    <td>
			<select name="quesito5" id="quesito5">
    		<option value="" selected="selected">--- Seleziona ---</option>
      		<?php $queryd5="select selezione from ".DB_NAME.".".QUESITO_SELECT." where domande=5";
			$resultd5 = mysql_query($queryd5) or die (mysql_error());
			while ($d5=mysql_fetch_array($resultd5)) { ?>     
    		<option value="<?=$d5['selezione']?>"><?=$d5['selezione']?></option>
   	 		<?php }?>
    		</select>
    </td>
    <?php }else{?>
    <td><input type="text" name="quesito5"  id="quesito5" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
    <?php } ?>
  </tr>
   <?php } } ?>*/ 

   ?>


<script>


$(document).ready(function() {

$( "#datepicker" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker30" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker40" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker43" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker44" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker45" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker46" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker47" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker50" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker60" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker70" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker73" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker75" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker80" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker81" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker82" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker83" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker84" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker85" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker86" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker88" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker90" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker95" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker96" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker98" ).datepicker({
changeMonth: true,
changeYear: true
});
});



function validateForm(frm) 
{
  var mail  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (frm.barcode.value == "")  
  {
    alert("ATTENZIONE BARCODE MANCANTE")
    frm.barcode.focus();
    return false;
  }
  if (frm.nome.value == "")  
  {
    alert("ATTENZIONE NOME MANCANTE")
    frm.nome.focus();
    return false;  
  }
  if (frm.cognome.value == "")  
  {
    alert("ATTENZIONE COGNOME MANCANTE")
    frm.cognome.focus();
    return false;
  }
  
  if (frm.indirizzo.value == "")  
  {
    alert("ATTENZIONE INDIRIZZO MANCANTE")
    frm.indirizzo.focus();
    return false;
  }
  
  if (frm.civico.value == "")  
  {
    alert("ATTENZIONE NUMERO CIVICO MANCANTE")
    frm.civico.focus();
    return false;
  }

  if (isNaN(frm.telefono.value) || frm.telefono.value =="") 
  {
    alert("ATTENZIONE INSERIRE SOLO VALORI NUMERICI SUL TELEFONO")
    frm.telefono.focus();
    return false;
  }

  if ((frm.mobile.value == "") || isNaN(frm.mobile.value)) 
  {
    alert("ATTENZIONE CELLULARE MANCANTE O INSERIRE SOLO VALORI NUMERICI")
    frm.mobile.focus();
    return false;
  }
if ((frm.email.value != "") && (!mail.test(frm.email.value))) {
alert("ATTENZIONE EMAIL NON VALIDA")
frm.email.focus();
return false;
}
if (frm.comune.value == "")  {
  alert("ATTENZIONE COMUNE MANCANTE")
  frm.comune.focus();
  return false;
}
if ((frm.cap.value == "") || isNaN(frm.cap.value)) {
alert("ATTENZIONE CAP MANCANTE O INSERIRE SOLO VALORI NUMERICI")
frm.cap.focus();
return false;
}
if (frm.prv.value == "")  {
alert("ATTENZIONE PROVINCIA MANCANTE")
frm.prv.focus();
return false;
}
if (frm.nascita.value == "")  
  {
    alert("ATTENZIONE DATA NASCITA MANCANTE")
    frm.nascita.focus();
    return false;
}
if (frm.sesso.value == "")  {
alert("ATTENZIONE SESSO MANCANTE")
frm.sesso.focus();
return false;
}
/*
if (frm.privacy.value == "0")  
{
  alert("ATTENZIONE DEVI ACCETTARE LA PRIVACY")
  frm.privacy.focus();
  return false;
}

  if (frm.privacy1.value == "")  
  {
    alert("ATTENZIONE DEVI COMPILARE IL CAMPO TRATTAMENTI DATI A FINI PUBBLICITARI")
    frm.privacy1.focus();
    return false;
  }*/
}

</script>