<script type="text/javascript">
// Clienti Completo INIZIO

$("#invioupd").click(function() { 
                  
var mail  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
 
if ((frm_upd.email.value != "") && (!mail.test(frm_upd.email.value))) {
alert("ATTENZIONE EMAIL NON VALIDA")
frm_upd.email.focus();
return false;
}
 
if (frm_upd.cellulare.value == "")  {
alert("ATTENZIONE CELLULARE MANCANTE")
frm_upd.cellulare.focus();
return false;
}

if (frm_upd.privacy2.value == "0")  {
alert("ATTENZIONE DEVI ACCETTARE LA PRIVACY")
frm_upd.privacy2.focus();
return false;
}   
                    
	    $('#tableUpdate').hide();
	    $('#tableUpdate').html("");
		$.get('<?= LNK_REQUEST ?>tableUpdate.php',{'barcode':$('#barcode').val(),'cellulare':$('#cellulare').val(),'mail':$('#email').val(),'privacy2':$('#privacy2').val(),'application':'concorsi'},function(html){
	 $('#tableUpdate').show();
		   $('#tableUpdate').html(html);
		}); 
		});

$("#noinvioupd").click(function() { 
		var completo = 1;
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableUpdate').hide();
	    $('#tableUpdate').html("");
		$.get('<?= LNK_REQUEST ?>tableUpdate.php',{'barcode':$('#barcode').val(), completo: completo,'application':'concorsi'},function(html){
	 $('#tableUpdate').show();
		   $('#tableUpdate').html(html);
		}); 
		});

// Clienti Completo FINE

  </script> 