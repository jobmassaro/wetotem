<div id="tabs-200" >
<br><br><a href="<?=LNK_GLOBAL?>utility/stampa_perizia.php" target="_blank">STAMPA PERIZIA</a><br>
    <form id="frm_per" method='post' action='<?php  echo $_SERVER['PHP_SELF']; ?>' enctype='multipart/form-data' onsubmit='return validateForm(this)'>
    <table width="100%" border="0">
  <tr>
    <td width="50%"><label for="promotriceper">Promotrice</label></td>
    <td><textarea name="promotriceper" id="promotriceper" class="required" rows="5" cols="40 onkeypress="return handleEnter(this, event)"></textarea></td>
  </tr>
  <tr>
    <td width="50%"><label for="areaper">Area</label></td>
    <td><textarea name="areaper" id="areaper" class="required" rows="5" cols="40 onkeypress="return handleEnter(this, event)"></textarea></td>
  </tr>
   <tr>
    <td width="50%"><label for="durataper">Durata</label></td>
    <td><textarea name="durataper" id="durataper" class="required" rows="5" cols="40 onkeypress="return handleEnter(this, event)"></textarea></td>
  </tr>
  <tr>
    <td width="50%"><label for="modalitaper">Modalita: <a href='http://www.web2generators.com/html-based-tools/online-html-entities-encoder-and-decoder' target ='_blank'>encode</a> </label></td>
    <td><textarea name="modalitaper" id="modalitaper" class="required" rows="5" cols="40 onkeypress="return handleEnter(this, event)"></textarea></td>
  </tr>
  <tr>
    <td width="50%"><label for="premiper">Premi (se immagine lasciare vuoto)</label></td>
    <td><textarea name="premiper" id="premitaper" class="required" rows="5" cols="40 onkeypress="return handleEnter(this, event)"></textarea></td>
  </tr>
  <tr>
    <td><label for="centroper">Centro</label>		
</td>
    <td><input type="text" name="centroper"  id="centroper" class="required" size="30" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
   <tr>
    <td><label for="data">Data</label>
</td>
    <td><input type="text" name="dataper"  id="dataper" class="required" size="11" onkeypress="return handleEnter(this, event)"/></td>
  </tr>
 
</table>
<table width="100%" border="0">
<tr>
    <td>
    <br />
<input type="submit" name="invio_per" id="invio_per" value="Registra" /></td>
  </tr>
</table>
		</form>


	</div>