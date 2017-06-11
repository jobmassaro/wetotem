<script type="text/javascript">
$("#stampa_vincita_we").click(function() { 
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableVincitawe').hide();
	    $('#tableVincitawe').html("");
		$.get('<?= LNK_REQUEST ?>tableVincita.php',{'id':$('#idwe').val(),'application':'concorsi'},function(html){
	 $('#tableVincitawe').show();
		   $('#tableVincitawe').html(html);
		}); 
		});
		
$("#stampa_vincita_se").click(function() { 
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableVincitase').hide();
	    $('#tableVincitase').html("");
		$.get('<?= LNK_REQUEST ?>tableVincita.php',{'id':$('#idse').val(),'application':'concorsi'},function(html){
	 $('#tableVincitase').show();
		   $('#tableVincitase').html(html);
		}); 
		});
		
  $("#stampa_vincita").click(function() { 
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableVincita').hide();
	    $('#tableVincita').html("");
		$.get('<?= LNK_REQUEST ?>tableVincita.php',{'id':$('#id').val(),'application':'concorsi'},function(html){
	 $('#tableVincita').show();
		   $('#tableVincita').html(html);
		}); 
		});
		
$("#stampa_vincita_online").click(function() { 
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableVincitaonline').hide();
	    $('#tableVincitaonline').html("");
		$.get('<?= LNK_REQUEST ?>tableVincitaonline.php',{'id':$('#ido').val(),'application':'concorsi'},function(html){
	 $('#tableVincitaonline').show();
		   $('#tableVincitaonline').html(html);
		}); 
		});

 $("#casella").click(function() { 
                    
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableCasellario_ins').hide();
	    $('#tableCasellario_ins').html("");
		$.get('<?= LNK_REQUEST ?>tableCasellario_ins.php',{'id':$('#id').val(),'application':'concorsi'},function(html){
	 $('#tableCasellario_ins').show();
		   $('#tableCasellario_ins').html(html);
		}); 
		});
		
$("#casellawe").click(function() { 
                    
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableCasellario_ins_we').hide();
	    $('#tableCasellario_ins_we').html("");
		$.get('<?= LNK_REQUEST ?>tableCasellario_ins.php',{'id':$('#idwe').val(),'application':'concorsi'},function(html){
	 $('#tableCasellario_ins_we').show();
		   $('#tableCasellario_ins_we').html(html);
		}); 
		});
		
$("#casellase").click(function() { 
                    
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableCasellario_ins_se').hide();
	    $('#tableCasellario_ins_se').html("");
		$.get('<?= LNK_REQUEST ?>tableCasellario_ins.php',{'id':$('#idse').val(),'application':'concorsi'},function(html){
	 $('#tableCasellario_ins_se').show();
		   $('#tableCasellario_ins_se').html(html);
		}); 
		});

 </script> 