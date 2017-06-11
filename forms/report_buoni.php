<div id="tabs-15">
            <form id="frm15" onsubmit='return validateForm5(this)'>
    <table width="100%" border="0">
<tr>
    <td>	
	<label for="data">Data Report </label></td><td>
<input type="text" name="data"  id="datepicker30" size="11" onkeypress="return handleEnter(this, event)" autofocus/></td>
<tr>
    <td>
	</table>
<table width="100%" border="0">
<tr>
    <td>
    <br />
<input type="button" name="invio15" id="invio15" value="Ricerca" class="btn btn-primary btn-lg"/>
	<!--input type="button" name="r_exp_invio" id="r_exp_invio" value="Esporta report" /-->
	</td></tr></table>
		</form>
		<div id="tableReportBuoni"></div>
	
	</div>	

<script>

$( "#datepicker30" ).datepicker({
changeMonth: true,
changeYear: true
});


$("#invio15").click(function() { 
		if (frm15.datepicker30.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA DATA")
frm15.datepicker30.focus();
return false;
}
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableReportBuoni').hide();
	    $('#tableReportBuoni').html("");
		$.get('../request/tableReportBuoni.php',{'data':$('#datepicker30').val(),'application':'concorsi'},function(html){
	 $('#tableReportBuoni').show();
		   $('#tableReportBuoni').html(html);
                   $('#frm15')[0].reset();
		}); 
	});
	
</script>