<div id="tabs" class="lessons">
                    <ul>
                    <li><a href="#tabs0">Lista Utenti</a></li>
                    <li><a href="#tabs1">Crea Utenti</a></li>
					
                    </ul>

<div style="overflow: auto;" id="tabs0">
<?php
	
	$contatto = new admin;
    $contatto->queryAction_utenti();
	?>
    </div>
<div style="overflow: auto;" id="tabs1">
 <form  name='frm' method='post' action='creautenti.php' enctype='multipart/form-data' >
  <table width=100% border=0 cellpadding=4 cellspacing=0>
    <tr>
      <td width=24% align=left valign=top>Nome</td>
      <td width=76%><input name='first_name' value="<?php echo $rows[first_name]; ?>" type='text' id='first_name'></td>
    </tr>
    <tr>
      <td align=left valign=top>Cognome</td>
      <td><input name='last_name' type='text' value="<?php echo $rows[last_name]; ?>" id='last_name'></td>
    </tr>
	<tr>
      <td align=left valign=top>Username</td>
      <td><input name='username' type='text' value="<?php echo $rows[username]; ?>" id='username'></td>
    </tr>
	<tr>
      <td align=left valign=top>Password</td>
      <td><input name='password' type='text' value="" id='password'></td>
    </tr>
     <tr>
    <td align=left valign=top>Livello</td>
    <td><select name="level" id="level">
    <option value="0" selected="selected">--- Seleziona ---</option>
          <option value="admin">Admin</option>
    <option value="concorso">Utenza per i concorsi</option>
 <option value="buoni">Utenza per i buoni</option>
    </select></td>
    <tr>
      <td align=left valign=top>Attivatore</td>
      <td><input name='activated' type='text' value="1" id='activated'>&nbsp;&nbsp;(1=Attivo - 0=Non Attivo)</td>
    </tr>
    <tr>
      <td align=left valign=top><input name='adminid' type='hidden' value='<?php echo $rows[adminid]; ?>'></td>
      <td><input type='submit' name='invio' value='Invia'></td>
    </tr>
  </table>
</form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
		var e = <?=$param;?> 
		$( "#tabs" ).tabs({selected: e});
		
	});
</script>    	