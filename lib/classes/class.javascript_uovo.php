<script type="text/javascript">

$("#inviouova").click(function() {
var barcode1 = $('#barcode').val();
var esercizio1 = $('#esercizio').val();
var importo1 = $('#importo').val(); 
var numero1 = $('#numero').val(); 
var nomebambino1 = $('#bambinoUova').val(); 
var databambino1 = $('#datepicker84').val(); 
var data1 = $('#data').val(); 
var uova1 = $.param( $( '[name="uova\[\]"]' ) );

$('#tableInserimentoUova').hide();
	   $.ajax({
      type: "POST",
      url: "<?= LNK_REQUEST ?>tableInserimentoUova.php",
      data: "barcode1=" + barcode1 + "&" + "nomebambino1=" + nomebambino1 + "&" + "databambino1=" + databambino1  + "&" + "esercizio1=" + esercizio1  + "&" + "importo1=" + importo1 + "&" + "numero1=" + numero1 + "&" + "data1=" + data1 + "&" + uova1,
      dataType: "html",
      success: function(msg)
      {
      $('#tableInserimentoUova').show();
      $('#tableInserimentoUova').html(msg);
      $('#frmUovo')[0].reset();
      }
      
    });                           
});
  </script> 