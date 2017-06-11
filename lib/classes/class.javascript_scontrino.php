<script type="text/javascript">

$("#invio11").click(function() {
var barcode1 = $.param( $( '[name="barcode111\[\]"]' ) );
var esercizio1 = $.param( $( '[name="esercizio111\[\]"]' ) );
var importo1 = $.param( $( '[name="importo111\[\]"]' ) ); 
var numero1 = $.param( $( '[name="numero111\[\]"]' ) ); 
var data1 = $.param( $( '[name="data111\[\]"]' ) ); 

$('#tableScontriniMultipli').hide();
	   $.ajax({
      type: "POST",
      url: "<?= LNK_REQUEST ?>tableScontriniMultipli.php",
      data: barcode1 + "&" + esercizio1  + "&" + importo1 + "&" + numero1 + "&" + data1,
      dataType: "html",
      success: function(msg)
      {
      $('#tableScontriniMultipli').show();
      $('#tableScontriniMultipli').html(msg);
      $('#frm1')[0].reset();
      }
      
    });                           
});
  </script> 