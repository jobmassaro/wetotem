<?php

use Models\Action;

session_start();

include('../inc/mysql.inc.php');

function ladata() {
    return date('Y-m-d');
}

//$a = new Action();
$giococompleto = Action::ControlloCompleto($dbc);
$time = date("H:i:s");
$sqlr4 = "select numero, blocco, numero1, blocco1, numero2, blocco2 from ".DB_NAME.".".CARNET." where date(data)=curdate() and (ora_inizio < '{$time}' and ora_fine > '{$time}' )";
//$sqlr4 = "select numero, blocco, numero1, blocco1, numero2, blocco2 from ".DB_NAME.".".CARNET." where date(data)=curdate() and (ora_inizio<curtime() and ora_fine>curtime())";

$resultr4=mysqli_query($dbc, $sqlr4);

$rdb_contar4= mysqli_fetch_array($resultr4, MYSQLI_ASSOC);
if (!$rdb_contar4['numero'])
{ ?>
<strong>ATTENZIONE LA VENDITA E' CHIUSA</strong>
<?php
}else{
$sqlr2 = "select sum(carnet1) as totale1, sum(carnet) as totale, sum(carnet2) as totale2 from ".DB_NAME.".".VENDITA." WHERE data_vendita LIKE '%" . ladata() ."%'";
$resultr2=mysqli_query($dbc,$sqlr2);
$rdb_contar2= mysqli_fetch_array($resultr2, MYSQLI_ASSOC);

$totalissimo2 = $rdb_contar4['numero']-$rdb_contar2['totale'];	
$totalissimo3 = $rdb_contar4['numero1']-$rdb_contar2['totale1'];
$totalissimo4 = $rdb_contar4['numero2']-$rdb_contar2['totale2'];



$sqlr1 = "select sum(carnet1) as totale1, sum(carnet) as totale, sum(carnet2) as totale2 from ".DB_NAME.".".VENDITA." ";
$resultr1=mysqli_query($dbc,$sqlr1) ;
$rdb_contar1=mysqli_fetch_array($resultr1, MYSQLI_ASSOC);
    
if ((!$totalissimo2) && (!$totalissimo3) && (!$totalissimo4))
{
?>
<br /><br />
<strong>ATTENZIONE HAI VENDUTO TUTTI I BUONI</strong>
<?php
}else{

?>
     <form id="frm13">
       
      <table width="100%" border="0" class="table">
          <tr>
    <td><label for="numero13"><?=$giococompleto->carnet1?>
</label></td><td>
<select name="numero13" id="numero13">
    <option value="0" selected="selected">--- Seleziona ---</option>
      <?php for ($j=1;$j<=$giococompleto->numero1;$j++) { ?>     
    <option value="<?=$j?>"><?=$j?></option>
    <?php } ?>
    </select>
</td>
  </tr>
  <?php if ($giococompleto->carnet2) { ?>
   <tr>
    <td><label for="numero113"><?=$giococompleto->carnet2?>
</label></td><td>
<select name="numero113" id="numero113">
    <option value="0" selected="selected">--- Seleziona ---</option>
     <?php for ($t=1;$t<=$giococompleto->numero2;$t++) { ?>     
    <option value="<?=$t?>"><?=$t?></option>
    <?php } ?>
    </select>
</td>
  </tr>
  <?php }
  if ($giococompleto->carnet3) { ?>
   <tr>
    <td><label for="numero213"><?=$giococompleto->carnet3?>
</label></td><td>
<select name="numero213" id="numero213">
    <option value="0" selected="selected">--- Seleziona ---</option>
     <?php for ($w=1;$w<=$giococompleto->numero3;$w++) { ?>     
    <option value="<?=$w?>"><?=$w?></option>
    <?php } ?>
    </select>
</td>
  </tr>
  <?php }
  if ($giococompleto->codbar) { ?>
        <tr>
          <td><label for="barcode13">Barcode</label></td>
          <td><input type="text" name="barcode13"  id="barcode13"  onkeypress="return handleEnter(this, event)" autofocus/></td>
        </tr>
		
   <?php }else{ ?> 
        <tr>
          <td><label for="barcode13">Codice Fiscale</label></td>
          <td><input type="text" name="barcode13"  id="barcode13"  onkeypress="return handleEnter(this, event)" autofocus/></td>
        </tr>
	  <?php } ?>	
       
        </table>
      
      <table width="100%" border="0">
  <tr>
    <td>
    <br />
<input type="button" name="invio13" id="invio13" value="Vendita Buoni" class="btn btn-primary btn-lg" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
	</form><br>
    <div id="tableRicevuta"></div>
<?php } } ?>
  </div>

<script>

$("#invio13").click(function() {
			if ($("#barcode13").val() == '') 
            {
			    alert("ATTENZIONE CODICE FISCALE O BARCODE MANCANTE")
			    frm13.barcode13.focus();
			    return false; 
            }
			
            if ($("#numero213").val() == '0' && $("#numero113").val() == '0' && $("#numero13").val() == '0') 
            {
			    alert("ATTENZIONE NUMERO BUONI MANCANTE")
			    frm213.numero213.focus();
			    return false; 
            }
			
            if ($("#numero113").val() == '0' && $("#numero13").val() == '0') 
            {
			    alert("ATTENZIONE NUMERO BUONI MANCANTE")
			    frm113.numero113.focus();
			    return false; 
            }
			
            if ($("#numero13").val() == '0' && $("#numero113").val() == null && $("#numero213").val() == null) 
            {
			    alert("ATTENZIONE NUMERO BUONI MANCANTE")
			    frm13.numero13.focus();
			    return false; 
            }
                   
            $('#tableRicevuta').hide();
	        $('#tableRicevuta').html("");
		//console.log($('#barcode13').val());
		
		$.get('../request/tableRicevuta.php',{'barcode':$('#barcode13').val(),'numero':$('#numero13').val(),'numero1':$('#numero113').val(),'numero2':$('#numero213').val(),'nome':$('#nome13').val(),'cognome':$('#cognome13').val(),'nascita':$('#datepicker83').val(),'comune':$('#comune13').val(),'cap':$('#cap13').val(),'application':'concorsi'},function(html){
		$('#tableRicevuta').show();
        
		   $('#tableRicevuta').html(html);
                  $('#frm13')[0].reset();
                   
		}); 

        
                            
});