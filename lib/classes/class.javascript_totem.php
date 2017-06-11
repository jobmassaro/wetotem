<script type="text/javascript">
<!--
function validateForm(frm_mappa) {

if (frm_mappa.valore.value == "")  {
frm_mappa.valore.focus();
return false;
}

if (frm_mappa.numero.value == "")  {
frm_mappa.numero.focus();
return false;
}

}

-->

function onlyNumeric(evt){
   /*Questa condizione ternaria è necessaria per questioni di compatibilità tra browser se "evt.which" non viene preso, usa "event.keyCode" */
   var charCode=(evt.which)?evt.which:event.keyCode;
   if((charCode>8 || charCode<8) && (charCode<46 || charCode>57))
      return false;
   return true;
}

function cancella() {
document.frm_mappa.valore.value=''
$('#canc').prop("disabled",false);
}

function aggiungi(n) {
document.frm_mappa.valore.value=document.frm_mappa.valore.value+n
}

function cancella1() {
document.frm_mappa.numero.value=''
$('#canc1').prop("disabled",false);
}

function aggiungi1(n) {
document.frm_mappa.numero.value=document.frm_mappa.numero.value+n
}

$('#canc').click(function(){
  $(this).prop("disabled",true);
});

$('#canc1').click(function(){
  $(this).prop("disabled",true);
});

</script>