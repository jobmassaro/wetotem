<div id="tabs" class="lessons">
	<div id="tabs-8">
		<form id="frm8">
			<table width="100%" border="0">
				<tr>
					<td><label for="barcode8">Barcode</label></td>
					<td><input type="text" name="barcode8" id="barcode8" class="required" size="11" /></td>
				</tr>
				<tr>
					<td><label for="numero8">Numero Persone</label></td>
					<td>
						<select name="numero8" id="numero8">
							<option value="" selected="selected">---Seleziona---</option>
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
					</td>
				</tr>
			</table>
			<table width="100%" border="0">
				<tr>
					<td>
						<br />
						<input type="button" name="invio8" id="invio8" value="Ingresso" />
						<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
					</td>
				</tr>
			</table>
			<br>
			<a href="../excel/baby.php">Scarica report</a>
		</form>
		<div id="tableBabyparking"></div>
	</div>
	
	
	
	
	
	




<script>
	$(document).ready(function() {
		$("#datepicker").datepicker({
			changeMonth: true,
			changeYear: true
		});
		$("#datepicker2").datepicker({
			changeMonth: true,
			changeYear: true
		});
		$("#datepicker3").datepicker({
			changeMonth: true,
			changeYear: true
		});
		$("#datepicker4").datepicker({
			changeMonth: true,
			changeYear: true
		});
	});

	<!--
	function validateForm(frm) {
		var mail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (frm.barcode.value == "") {
			alert("ATTENZIONE BARCODE MANCANTE")
			frm.barcode.focus();
			return false;
		}
		if (frm.nome.value == "") {
			alert("ATTENZIONE NOME MANCANTE")
			frm.nome.focus();
			return false;
		}
		if (frm.cognome.value == "") {
			alert("ATTENZIONE COGNOME MANCANTE")
			frm.cognome.focus();
			return false;
		}
		if (frm.indirizzo.value == "") {
			alert("ATTENZIONE INDIRIZZO MANCANTE")
			frm.indirizzo.focus();
			return false;
		}
		if (isNaN(frm.telefono.value)) {
			alert("ATTENZIONE INSERIRE SOLO VALORI NUMERICI SUL TELEFONO")
			frm.telefono.focus();
			return false;
		}
		if ((frm.mobile.value == "") || isNaN(frm.mobile.value)) {
			alert("ATTENZIONE CELLULARE MANCANTE O INSERIRE SOLO VALORI NUMERICI")
			frm.mobile.focus();
			return false;
		}
		if ((frm.email.value != "") && (!mail.test(frm.email.value))) {
			alert("ATTENZIONE EMAIL NON VALIDA")
			frm.email.focus();
			return false;
		}
		if (frm.comune.value == "") {
			alert("ATTENZIONE COMUNE MANCANTE")
			frm.comune.focus();
			return false;
		}
		if ((frm.cap.value == "") || isNaN(frm.cap.value)) {
			alert("ATTENZIONE CAP MANCANTE O INSERIRE SOLO VALORI NUMERICI")
			frm.cap.focus();
			return false;
		}
		if (frm.prv.value == "") {
			alert("ATTENZIONE PROVINCIA MANCANTE")
			frm.prv.focus();
			return false;
		}
		if (frm.privacy.value == "0") {
			alert("ATTENZIONE DEVI ACCETTARE LA PRIVACY")
			frm.privacy.focus();
			return false;
		}
		if (frm.privacy1.value == "") {
			alert("ATTENZIONE DEVI COMPILARE IL CAMPO TRATTAMENTI DATI A FINI PUBBLICITARI")
			frm.privacy1.focus();
			return false;
		}
	}
	-->
</script>


<script type="text/javascript">
	// invio tasso conversione valore
	$("#invio8").click(function() {
		$('#tableBabyparking').hide();
		$('#tableBabyparking').html("");
		$.get('../request/tableBabyparking.php', {
			'numero': $('#numero8').val(),
			'barcode': $('#barcode8').val(),
			'application': 'concorsi'
		}, function(html) {
			$('#tableBabyparking').show();
			$('#tableBabyparking').html(html);
			$('#frm8')[0].reset();
		});
	});
</script>