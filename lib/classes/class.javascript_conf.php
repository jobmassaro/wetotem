<script type="text/javascript">
 $("#invio101").click(function() { 
		if (frm101.id101.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA TABELLA")
frm101.id101.focus();
return false;
}


	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableConf_id').hide();
	    $('#tableConf_id').html("");
		$.get('<?= LNK_REQUEST ?>tableConf.php',{'id':$('#id101').val(),'valore':$('#valore101').val(),'application':'concorsi'},function(html){
         $('#tableConf_id_1').hide();
	 $('#tableConf_id').show();
		   $('#tableConf_id').html(html);
                   $('#frm101')[0].reset();
		}); 
		});
  </script> 