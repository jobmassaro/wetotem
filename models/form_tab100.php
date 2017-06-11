<div id="tabs-100">
<br>
			STAMPA LIBERATORIE PREMI
			<br><a href="<?=LNK_UTY?>stampa_premi.php" target="_new">Stampa</a>
			 <br><br>
<form id="frm100" onsubmit='return validateForm5(this)'>
    <table width="100%" border="0">
<tr>
    <td><label for="data">Tabella da Configurare </label></td>
    <td><select name="valore100" id="valore100">
    <option value="" selected="selected">--- Seleziona ---</option>
    <option value="CONCORSO">Configurazione Concorso</option>
    <option value="GIORNATA">Configurazione Giornata</option>
    <option value="PROBABILITA">Configurazione Probabilita</option>
    <option value="TABS">Configurazione Tabs</option>
    <option value="GIORNATA_ONLINE">Configurazione Giornata Online</option>
    <option value="PROBABILITA_ONLINE">Configurazione Probabilita Online</option>
	<option value="QUERY">Configurazione query</option>
	<option value="QUERY_ESTRAZIONI">Configurazione query estrazioni</option>
    </select></td>
<tr>

	</table>
<table width="100%" border="0">
<tr>
    <td>
    <br />
<input type="button" name="invio100" id="invio100" value="Ricerca" />
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
		</form>
		<div id="tableConf"></div>
	
	</div>	