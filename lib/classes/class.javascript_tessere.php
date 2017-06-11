<script type="text/javascript">
 $("#bottoneTessere").click(function(){
      
    var barcode = $('[name="barcodetabella"]:checked').val();
    if(barcode == null) { 
    alert("ATTENZIONE DEVI SCEGLIERE UNA CASELLA")
return false;
}
    $.ajax({
      type: "POST",
      url: "../request/tableSostituzioneCard.php",
      data: "barcode=" + barcode,
      dataType: "html",
      success: function(msg)
      {
          $("#bottoneTessere").hide();
           $("#bottone1Tessere").hide();
        $("#tableSostituzioneCard").html(msg);
      }
    });
  });

 $("#bottoneTessere_prov").click(function(){
     
	    var barcode = $('[name="barcodetabella"]:checked').val();
	    if(barcode == null) { 
	    alert("ATTENZIONE DEVI SCEGLIERE UNA CASELLA")
	return false;
	}
	    $.ajax({
	      type: "POST",
	      url: "<?= LNK_REQUEST ?>tableSostituzioneCard_prov.php",
	      data: "barcode=" + barcode,
	      dataType: "html",
	      success: function(msg)
	      {
	          $("#bottoneTessere").hide();
	           $("#bottone1Tessere").hide();
	        $("#tableSostituzioneCard").html(msg);
	      }
	    });
	  });
 
 $("#bottoneTessere_bamb").click(function(){
     
	    var barcode = $('[name="barcodetabella"]:checked').val();
	    if(barcode == null) { 
	    alert("ATTENZIONE DEVI SCEGLIERE UNA CASELLA")
	return false;
	}
	    $.ajax({
	      type: "POST",
	      url: "<?= LNK_REQUEST ?>tableSostituzioneCard_bamb.php",
	      data: "barcode=" + barcode,
	      dataType: "html",
	      success: function(msg)
	      {
	          $("#bottoneTessere").hide();
	           $("#bottone1Tessere").hide();
	        $("#tableSostituzioneCard").html(msg);
	      }
	    });
	  });
 $("#bottoneTessere_figli").click(function(){
     
	    var barcode = $('[name="barcodetabella"]:checked').val();
	    if(barcode == null) { 
	    alert("ATTENZIONE DEVI SCEGLIERE UNA CASELLA")
	return false;
	}
	    $.ajax({
	      type: "POST",
	      url: "<?= LNK_REQUEST ?>tableSostituzioneCard_figli.php",
	      data: "barcode=" + barcode,
	      dataType: "html",
	      success: function(msg)
	      {
	          $("#bottoneTessere").hide();
	           $("#bottone1Tessere").hide();
	        $("#tableSostituzioneCard").html(msg);
	      }
	    });
	  });
$("#bottone1Tessere").click(function(){
  if (!(confirm("ATTENZIONE!\nSTAI ELIMINANDO UNA TESSERA\nVUOI CONTINUARE?")))
{return false;}
else
{
		var id = $('[name="id"]').val();
    var barcode = $('[name="barcodetabella"]:checked').val();
//operazioni che cancellano
 $.ajax({
      type: "POST",
      url: "../request/tableEliminaCard.php",
      data: ({ barcode: barcode, id: id}), 
      dataType: "html",
      success: function(msg)
      {
          $("#bottoneTessere").hide();
          $("#bottone1Tessere").hide();
        $("#tableSostituzioneCard").html(msg);
      }
    });
   }
  });
  </script> 