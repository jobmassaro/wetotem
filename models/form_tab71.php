<div id="tabs-71" >
    <form id="frm71">
			
						<table width="100%" border="0">
<tr>
    <td><label for="barcode71">Barcode</label></td>
<td><input type="text" name="barcode71"  id="barcode71" class="required" size="11" onkeypress="return handleEnter(this, event)"/></td></tr>
<tr>
    <td>
	<label for="struttura71">Attrazione</label></td><td>
<select name="struttura71" id="struttura71">
           <option value="" selected="selected">--- Seleziona ---</option>
      <?php $query4="select * from ".DB_NAME.".".ATTRAZIONE." where tempo != 0";
$result4 = mysql_query($query4) or die (mysql_error());
while ($rdattrazioni=mysql_fetch_array($result4)) { ?>     
    <option value="<?=$rdattrazioni['id']?>"><?=$rdattrazioni['nome']?></option>
    <?php }?>
       </select>
</td></tr>                
<tr>
          <td>Numero Persone che entrano:</td>
            <td><select name="ingressi71" id="ingressi71">
            <option value="">Numero</option>  
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
         </select></td></tr>   
<tr>
          <td>Tempo permanenza:</td>
            <td><select name="tempo71" id="tempo71">
             
              <option value="30" selected="selected">30 Minuti</option>
    <option value="45" selected="selected">45 Minuti</option>
 <option value="60" selected="selected">60 Minuti</option>

       </select></td></tr>      
             <tr>
    <td>
	<label for="free72">FREE PASS </label></td><td>
<input type="text" name="free71"  id="free71" size="11" onkeypress="return handleEnter(this, event)"/>
</td></tr>                          
                                                </table>
   <br /><div id="tablepersone71"></div><br>                                              
<table width="100%" border="0">
<tr>
    <td>
    <br />
<input type="button" name="invio71" id="invio71" value="Ingresso" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
	</form><br>
    <form id="frm72">
        
    <table width="100%" border="0">
<tr>
    <td>
	<label for="cognome72">Cognome </label></td><td>
<input type="text" name="cognome72"  id="cognome72" size="11" onkeypress="return handleEnter(this, event)"/>
</td></tr>
<tr>
    <td>
	<label for="struttura72">Attrazione</label></td><td>
<select name="struttura72" id="struttura72">
<option value="" selected="selected">--- Seleziona ---</option>
      <?php $query5="select * from ".DB_NAME.".".ATTRAZIONE." where tempo != 0";
$result5 = mysql_query($query5) or die (mysql_error());
while ($rdattrazioni5=mysql_fetch_array($result5)) { ?>     
    <option value="<?=$rdattrazioni5['id']?>"><?=$rdattrazioni5['nome']?></option>
    <?php }?>


       </select>
</td></tr>
       <tr>
    <td>
	<label for="persone72">Numero Persone che entrano</label></td><td>
<select name="ingressi72" id="ingressi72">
            <option value="">Numero</option>  
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
         </select>
</td></tr>
<tr>
          <td>Tempo permanenza:</td>
            <td><select name="tempo72" id="tempo72">
             
              <option value="30" selected="selected">30 Minuti</option>
    <option value="45" selected="selected">45 Minuti</option>
 <option value="60" selected="selected">60 Minuti</option>

       </select></td></tr>  
<tr>
    <td>
	<label for="free72">FREE PASS </label></td><td>
<input type="text" name="free72"  id="free72" size="11" onkeypress="return handleEnter(this, event)"/>
</td></tr>
               </table>
               <br /><div id="tablepersone72"></div><br>
<table width="100%" border="0">
<tr>
    <td>
    <br />
<input type="button" name="invio72" id="invio72" value="Ingresso" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
		</form><br>
	<div id="tableTessera71"></div><br><br>
    <div id="tableTessera72"></div><br><br>
		
</div>