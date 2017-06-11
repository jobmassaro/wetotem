	<div id="tabs-5">
		<form id="frm5" onsubmit='return validateForm5(this)'>
			<table width="100%" border="0">
				<tr>
					<td><label for="data">Data Report </label></td>
					<td><input type="text" name="data" id="datepicker3" size="11" onkeypress="return handleEnter(this, event)" autofocus/></td>
				</tr>
			</table>
			<table width="100%" border="0">
				<tr>
					<td>
						<br />
						<input type="button" name="invio5" id="invio5" value="Ricerca" />
						<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
					</td>
				</tr>
			</table>
		</form>
		<div id="tableReport"></div>
	</div>


    <script>
	
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
	

    </script>

    <script type="text/javascript">
	// invio tasso conversione valore
	$("#invio5").click(function() {
		if (frm5.datepicker3.value == "") {
			alert("ATTENZIONE DEVI SCEGLIERE UNA DATA")
			frm5.datepicker3.focus();
			return false;
		}
		// resetto eventuali errori visualizzati da un click precedente
		$('#tableReport').hide();
		$('#tableReport').html("");
		$.get('../request/tableReport.php', {
			'data': $('#datepicker3').val(),
			'application': 'concorsi'
		}, function(html) {
			$('#tableReport').show();
			$('#tableReport').html(html);
			$('#frm5')[0].reset();
		});
	});
</script>