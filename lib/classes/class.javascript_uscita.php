<script type="text/javascript">
$("#uscito").click(function(){
var uscita = $.param( $( '[name="uscita\[\]"]:checked' ));
//operazioni che cancellano
	 $.ajax({
	      type: "POST",
	      url: "<?= LNK_REQUEST ?>tableUscita.php",
	      data: uscita,
	      dataType: "html",
	      success: function(msg)
	      {
	        $("#uscito1").html(msg);
	      }
	    });

	  });
</script>