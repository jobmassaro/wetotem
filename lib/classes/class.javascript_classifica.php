<script type="text/javascript">
 $("#bottoneClassifica").click(function(){
      
    var id = $('[name="barcodepunteggio"]:checked').val();
    var settore = $('#settore').val();
    if(id == null) { 
    alert("ATTENZIONE DEVI SCEGLIERE UNA CASELLA")
return false;
}
    $.ajax({
      type: "POST",
      url: "<?= LNK_REQUEST ?>tableInsPunteggio.php",
      data: "id=" + id + "&" + "settore=" + settore,
      dataType: "html",
      success: function(msg)
      {
        $("#bottoneClassifica").hide();
        $("#tableInsPunteggio").html(msg);
      }
    });
  });


//Controllo classifica INIZIO
 $("#invioClassifica").click(function() { 
	 if ($("#punteggio").val() == '') {
			alert("ATTENZIONE PUNTEGGIO MANCANTE")
			frmCla.punteggio.focus();
				return false; }
 	// resetto eventuali errori visualizzati da un click precedente
 	    $('#tablePunteggioInserito').hide();
 	    $('#tablePunteggioInserito').html("");
 		$.get('<?= LNK_REQUEST ?>tablePunteggioInserito.php',{'punteggio':$('#punteggio').val(),'barcode':$('#barcodeCla').val(),'id':$('#idCla').val(),'settore':$('#settoreCla').val(),'eta':$('#etaCla').val(),'application':'concorsi'},function(html){
 	 $('#tablePunteggioInserito').show();
 		   $('#tablePunteggioInserito').html(html);
                    $('#frmCla')[0].reset();
 		}); 
 		});
 		

 // Controllo classifica FINE
  </script> 