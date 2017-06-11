<script type="text/javascript">

// Controllo INIZIO
<!--
function outboundLink() {
	return confirm("ATTENZIONE!\nSTAI MODIFICANDO DATI\nVUOI CONTINUARE?");
}
//-->
// Controllo FINE

// Controllo date INIZIO

$(document).ready(function() {

$( "#datepicker" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker30" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker40" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker43" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker44" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker45" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker46" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker47" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker50" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker60" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker70" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker73" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker75" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker80" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker81" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker82" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker83" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker84" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker85" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker86" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker88" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker90" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker95" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker96" ).datepicker({
changeMonth: true,
changeYear: true
});
$( "#datepicker98" ).datepicker({
changeMonth: true,
changeYear: true
});
});
// Controllo date FINE

// Nuova Tessera INIZIO

<!--
function validateForm(frm) {
var mail  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

if (frm.barcode.value == "")  {
alert("ATTENZIONE BARCODE MANCANTE")
frm.barcode.focus();
return false;
}
if (frm.nome.value == "")  {
alert("ATTENZIONE NOME MANCANTE")
frm.nome.focus();
return false;
}
if (frm.cognome.value == "")  {
alert("ATTENZIONE COGNOME MANCANTE")
frm.cognome.focus();
return false;
}
if (frm.indirizzo.value == "")  {
alert("ATTENZIONE INDIRIZZO MANCANTE")
frm.indirizzo.focus();
return false;
}
if (frm.civico.value == "")  {
alert("ATTENZIONE NUMERO CIVICO MANCANTE")
frm.civico.focus();
return false;
}
if  (isNaN(frm.telefono.value)) {
alert("ATTENZIONE INSERIRE SOLO VALORI NUMERICI SUL TELEFONO")
frm.telefono.focus();
return false;
}
if ((frm.mobile.value == "") || isNaN(frm.mobile.value)) {
alert("ATTENZIONE CELLULARE MANCANTE O INSERIRE SOLO VALORI NUMERICI")
frm.mobile.focus();
return false;
}
if ((frm.email.value != "") && (!mail.test(frm.email.value))) {
alert("ATTENZIONE EMAIL NON VALIDA")
frm.email.focus();
return false;
}
if (frm.comune.value == "")  {
alert("ATTENZIONE COMUNE MANCANTE")
frm.comune.focus();
return false;
}
if ((frm.cap.value == "") || isNaN(frm.cap.value)) {
alert("ATTENZIONE CAP MANCANTE O INSERIRE SOLO VALORI NUMERICI")
frm.cap.focus();
return false;
}
if (frm.prv.value == "")  {
alert("ATTENZIONE PROVINCIA MANCANTE")
frm.prv.focus();
return false;
}
if (frm.nascita.value == "")  {
alert("ATTENZIONE DATA NASCITA MANCANTE")
frm.nascita.focus();
return false;
}
if (frm.sesso.value == "")  {
alert("ATTENZIONE SESSO MANCANTE")
frm.sesso.focus();
return false;
}
if (frm.privacy.value == "0")  {
alert("ATTENZIONE DEVI ACCETTARE LA PRIVACY")
frm.privacy.focus();
return false;
}
if (frm.privacy1.value == "")  {
alert("ATTENZIONE DEVI COMPILARE IL CAMPO TRATTAMENTI DATI A FINI PUBBLICITARI")
frm.privacy1.focus();
return false;
}
}

-->
// Nuova Tessera FINE

// Nuova Tessera INIZIO

<!--
function validateForm43(frm43) {
var mail43  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

if (frm43.cf43.value == "")  {
alert("ATTENZIONE BARCODE MANCANTE")
frm43.cf43.focus();
return false;
	}
if (frm43.barcode43.value == "")  {
alert("ATTENZIONE BARCODE MANCANTE")
frm43.barcode43.focus();
return false;
}
if (frm43.nome43.value == "")  {
alert("ATTENZIONE NOME MANCANTE")
frm43.nome43.focus();
return false;
}
if (frm43.cognome43.value == "")  {
alert("ATTENZIONE COGNOME MANCANTE")
frm43.cognome43.focus();
return false;
}
if (frm43.indirizzo43.value == "")  {
alert("ATTENZIONE INDIRIZZO MANCANTE")
frm43.indirizzo43.focus();
return false;
}
if (frm43.civico43.value == "")  {
alert("ATTENZIONE NUMERO CIVICO MANCANTE")
frm43.civico43.focus();
return false;
}
if ((frm43.mobile43.value == "") || isNaN(frm43.mobile43.value)) {
alert("ATTENZIONE CELLULARE MANCANTE O INSERIRE SOLO VALORI NUMERICI")
frm43.mobile43.focus();
return false;
}
if ((frm43.email43.value != "") && (!mail43.test(frm43.email43.value))) {
alert("ATTENZIONE EMAIL NON VALIDA")
frm43.email43.focus();
return false;
}
if (frm43.comune43.value == "")  {
alert("ATTENZIONE COMUNE MANCANTE")
frm43.comune43.focus();
return false;
}
if ((frm43.cap43.value == "") || isNaN(frm43.cap43.value)) {
alert("ATTENZIONE CAP MANCANTE O INSERIRE SOLO VALORI NUMERICI")
frm43.cap43.focus();
return false;
}
if (frm43.prv43.value == "")  {
alert("ATTENZIONE PROVINCIA MANCANTE")
frm43.prv43.focus();
return false;
}
if (frm43.nascita43.value == "")  {
alert("ATTENZIONE DATA NASCITA MANCANTE")
frm43.nascita43.focus();
return false;
}

if (frm43.privacy43.value == "0")  {
alert("ATTENZIONE DEVI ACCETTARE LA PRIVACY")
frm43.privacy43.focus();
return false;
}
if (frm43.privacy143.value == "")  {
alert("ATTENZIONE DEVI COMPILARE IL CAMPO TRATTAMENTI DATI A FINI PUBBLICITARI")
frm43.privacy143.focus();
return false;
}
}

-->
// Nuova Tessera FINE

// Nuova Tessera provvisoria INIZIO
<!--
function validateForm32(frm32) {


if (frm32.barcode32.value == "")  {
alert("ATTENZIONE BARCODE MANCANTE")
frm32.barcode32.focus();
return false;
}
if (frm32.nome32.value == "")  {
alert("ATTENZIONE NOME MANCANTE")
frm32.nome32.focus();
return false;
}
if (frm32.cognome32.value == "")  {
alert("ATTENZIONE COGNOME MANCANTE")
frm32.cognome32.focus();
return false;
}


if (frm32.privacy32.value == "0")  {
alert("ATTENZIONE DEVI ACCETTARE LA PRIVACY")
frm32.privacy32.focus();
return false;
}



}

-->
// Nuova Tessera provvisoria FINE

// Nuova Tessera bambini INIZIO
<!--
function validateForm35(frm35) {

var mail35  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			

if (frm35.barcode35.value == "")  {
alert("ATTENZIONE BARCODE MANCANTE")
frm35.barcode35.focus();
return false;
}
if (frm35.nome35.value == "")  {
alert("ATTENZIONE NOME MANCANTE")
frm35.nome35.focus();
return false;
}
if (frm35.cognome35.value == "")  {
alert("ATTENZIONE COGNOME MANCANTE")
frm35.cognome35.focus();
return false;
}

if (frm35.nomePM.value == "")  {
alert("ATTENZIONE NOME MANCANTE")
frm35.nomePM.focus();
return false;
}

if (frm35.cognomePM.value == "")  {
alert("ATTENZIONE COGNOME MANCANTE")
frm35.cognomePM.focus();
return false;
}

if (frm35.eta35.value == "")  {
alert("ATTENZIONE ETA MANCANTE")
frm35.eta35.focus();
return false;
}

if ((frm35.mobile35.value == "") || isNaN(frm35.mobile35.value)) {
("ATTENZIONE CELLULARE MANCANTE O INSERIRE SOLO VALORI NUMERICI")
frm35.mobile35.focus();
return false;
}

if ((frm35.email35.value != "") && (!mail35.test(frm35.email35.value))) {
alert("ATTENZIONE EMAIL NON VALIDA")
frm35.email35.focus();
return false;
}

if (frm35.privacy35.value == "0")  {
alert("ATTENZIONE DEVI ACCETTARE LA PRIVACY")
frm35.privacy35.focus();
return false;
}



}

-->
// Nuova Tessera provvisoria FINE

// Caricamento Crediti INIZIO

$("#invio1").click(function() {
			if ($("#barcode1").val() == '') {
			alert("ATTENZIONE BARCODE MANCANTE")
			frm1.barcode1.focus();
				return false; }
			if ($("#esercizio1").val() == '') {
			alert("ATTENZIONE ESERCIZIO MANCANTE")
			frm1.esercizio1.focus();
				return false; }
				if ($("#importo1").val() == '') {
			alert("ATTENZIONE IMPORTO MANCANTE O TROPPO BASSO")
			frm1.importo1.focus();
				return false; }
                       
                            $('#tableScontrini').hide();
	    $('#tableScontrini').html("");
		$.get('<?= LNK_REQUEST ?>tableScontrini.php',{'esercizio':$('#esercizio1').val(),'numero':$('#numero1').val(),'data':$('#datepicker50').val(),'barcode':$('#barcode1').val(),'importo':$('#importo1').val(),'voto':$('#voto1').val(),'application':'concorsi'},function(html){
	 $('#tableScontrini').show();
		   $('#tableScontrini').html(html);
                   $('#frm1')[0].reset();
		}); 
                            
});

// Caricamento Crediti FINE

// Elenco tessere INIZIO
$("#invio3").click(function() { 
		// resetto eventuali errori visualizzati da un click precedente
	    $('#tableTessera').hide();
	    $('#tableTessera').html("");
		$.get('<?= LNK_REQUEST ?>tableTessera.php',{'cognome':$('#cognome3').val(),'barcode':$('#barcode3').val(),'application':'concorsi'},function(html){
	 $('#tableTessera').show();
		   $('#tableTessera').html(html);
                   $('#frm3')[0].reset();
		}); 
		});

// Elenco tessere FINE

// Elenco tableClaPunt INIZIO
$("#invio26").click(function() { 
	 if ($("#barcode26").val() == '') {
			alert("ATTENZIONE BARCODE MANCANTE")
			frm26.barcode26.focus();
				return false; }
	 if ($("#ingressi26").val() == '') {
			alert("ATTENZIONE ATTRAZIONE MANCANTE")
			frm26.ingressi26.focus();
				return false; }
		// resetto eventuali errori visualizzati da un click precedente
	    $('#tableClaPunt').hide();
	    $('#tableClaPunt').html("");
		$.get('<?= LNK_REQUEST ?>tableClassifica.php',{'barcode':$('#barcode26').val(),'settore':$('#ingressi26').val(),'application':'concorsi'},function(html){
	 $('#tableClaPunt').show();
		   $('#tableClaPunt').html(html);
                   $('#frm26')[0].reset();
		}); 
		});

// Elenco tableClaPunt FINE

// Controllo vincite INIZIO
$("#invio4").click(function() { 
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableGiocata').hide();
	    $('#tableGiocata').html("");
		$.get('<?= LNK_REQUEST ?>tableGiocata.php',{'data':$('#datepicker60').val(),'cognome':$('#cognome4').val(),'barcode':$('#barcode4').val(),'application':'concorsi'},function(html){
	 $('#tableGiocata').show();
		   $('#tableGiocata').html(html);
                   $('#frm4')[0].reset();
		}); 
		});
		

// Controllo vincite FINE

// Controllo vincite_we INIZIO
$("#invio30").click(function() { 
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableGiocatawe').hide();
	    $('#tableGiocatawe').html("");
		$.get('<?= LNK_REQUEST ?>tableGiocata_we.php',{'data':$('#datepicker98').val(),'cognome':$('#cognome30').val(),'barcode':$('#barcode30').val(),'application':'concorsi'},function(html){
	 $('#tableGiocatawe').show();
		   $('#tableGiocatawe').html(html);
                   $('#frm30')[0].reset();
		}); 
		});
		

// Controllo vincite_we FINE

// Controllo vincite_se INIZIO
$("#invio33").click(function() { 
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableGiocatase').hide();
	    $('#tableGiocatase').html("");
		$.get('<?= LNK_REQUEST ?>tableGiocata_se.php',{'data':$('#datepicker88').val(),'cognome':$('#cognome33').val(),'barcode':$('#barcode33').val(),'application':'concorsi'},function(html){
	 $('#tableGiocatase').show();
		   $('#tableGiocatase').html(html);
                   $('#frm33')[0].reset();
		}); 
		});
		

// Controllo vincite_se FINE

// Report INIZIO
$("#invio5").click(function() { 
		if (frm5.datepicker70.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA DATA")
frm5.datepicker70.focus();
return false;
}
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableReport').hide();
	    $('#tableReport').html("");
		$.get('<?= LNK_REQUEST ?>tableReport.php',{'data':$('#datepicker70').val(),'application':'concorsi'},function(html){
	 $('#tableReport').show();
		   $('#tableReport').html(html);
                   $('#frm5')[0].reset();
		}); 
		});
// Report FINE

// Report INIZIO
$("#invio45").click(function() { 
		if (frm45.datepicker73.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA DATA")
frm45.datepicker73.focus();
return false;
}
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableReport').hide();
	    $('#tableReport').html("");
		$.get('<?= LNK_REQUEST ?>tableReportMulti.php',{'data':$('#datepicker73').val(),'application':'concorsi'},function(html){
	 $('#tableReport').show();
		   $('#tableReport').html(html);
                   $('#frm45')[0].reset();
		}); 
		});
// Report FINE

// Report FOTO INIZIO
$("#invio55").click(function() { 
		if (frm55.datepicker75.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA DATA")
frm55.datepicker75.focus();
return false;
}
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableReportFoto').hide();
	    $('#tableReportFoto').html("");
		$.get('<?= LNK_REQUEST ?>tableReportFoto.php',{'data':$('#datepicker75').val(),'application':'concorsi'},function(html){
	 $('#tableReportFoto').show();
		   $('#tableReportFoto').html(html);
                   $('#frm55')[0].reset();
		}); 
		});
// Report Foto FINE

// Report Buoni INIZIO
$("#invio15").click(function() { 
		if (frm15.datepicker30.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA DATA")
frm15.datepicker30.focus();
return false;
}
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableReportBuoni').hide();
	    $('#tableReportBuoni').html("");
		$.get('<?= LNK_REQUEST ?>tableReportBuoni.php',{'data':$('#datepicker30').val(),'application':'concorsi'},function(html){
	 $('#tableReportBuoni').show();
		   $('#tableReportBuoni').html(html);
                   $('#frm15')[0].reset();
		}); 
		});
// Report Buoni FINE

// Report Ingressi INIZIO
$("#invio9").click(function() { 
		if (frm9.datepicker90.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA DATA")
frm9.datepicker90.focus();
return false;
}
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableReportIngressi').hide();
	    $('#tableReportIngressi').html("");
		$.get('<?= LNK_REQUEST ?>tableReportAccessi.php',{'data':$('#datepicker90').val(),'application':'concorsi'},function(html){
	 $('#tableReportIngressi').show();
		   $('#tableReportIngressi').html(html);
                   $('#frm9')[0].reset();
		}); 
		});
// Report Ingressi FINE

// Vincitori estrazione INIZIO
		$("#invio_15").click(function() { 
		
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableVincitori').hide();
	    $('#tableVincitori').html("");
		$.get('<?= LNK_REQUEST ?>tableVincitori.php',{'application':'concorsi'},function(html){
	 $('#tableVincitori').show();
		   $('#tableVincitori').html(html);
               
		}); 
		});
// Vincitori estrazione FINE

// Giocata Online INIZIO
		$("#invio6").click(function() { 
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableGiocataonline').hide();
	    $('#tableGiocataonline').html("");
		$.get('<?= LNK_REQUEST ?>tableGiocataonline.php',{'data':$('#datepicker80').val(),'cognome':$('#cognome6').val(),'barcode':$('#barcode6').val(),'application':'concorsi'},function(html){
	 $('#tableGiocataonline').show();
		   $('#tableGiocataonline').html(html);
                   $('#frm6')[0].reset();
		}); 
		});
// Giocata Online FINE

// Casellario INIZIO
$("#invio12").click(function() { 
                    if (frm12.datepicker40.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA DATA")
frm12.datepicker40.focus();
return false;
}
                
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableCasellario_multi').hide();
	    $('#tableCasellario_multi').html("");
		$.get('<?= LNK_REQUEST ?>tableCasellario_multi.php',{'data':$('#datepicker40').val(),'application':'concorsi'},function(html){
	 $('#tableCasellario_multi').show();
		   $('#tableCasellario_multi').html(html);
                   $('#frm12')[0].reset();
		}); 
		});

// Casellario FINE

// Casellario INIZIO
$("#invio16").click(function() { 
                
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableCasellario').hide();
	    $('#tableCasellario').html("");
		$.get('<?= LNK_REQUEST ?>tableCasellario.php',{'application':'concorsi'},function(html){
	 $('#tableCasellario').show();
		   $('#tableCasellario').html(html);
                   $('#frm16')[0].reset();
		}); 
		});

// Casellario FINE

// Vita Tessera INIZIO
		$("#invio22").click(function() { 
		// resetto eventuali errori visualizzati da un click precedente
	    $('#tableVitaTessera').hide();
	    $('#tableVitaTessera').html("");
		$.get('<?= LNK_REQUEST ?>tableVitaTessera.php',{'cognome':$('#cognome22').val(),'barcode':$('#barcode22').val(),'application':'concorsi'},function(html){
	 $('#tableVitaTessera').show();
		   $('#tableVitaTessera').html(html);
                   $('#frm22')[0].reset();
		}); 
		});
// Vita Tessera FINE

// BabyParking INIZIO
$("#invio7").click(function() {

    
			if ($("#barcode7").val() == '') {
			alert("ATTENZIONE BARCODE MANCANTE")
			frm7.barcode7.focus();
				return false; }
                            
$('#tableBabyparking').hide();
	    $('#tableBabyparking').html("");
		$.get('<?= LNK_REQUEST ?>tableBabyparking.php',{'nome_bambino':$('#nome_bambino').val(),'nome_accompagnatore':$('#cognome_accompagnatore').val(),'eta_bambino':$('#eta_bambino').val(),'barcode':$('#barcode7').val(),'importo':$('#importo1').val(),'application':'concorsi'},function(html){
	 $('#tableBabyparking').show();
		   $('#tableBabyparking').html(html);
                    $('#frm7')[0].reset();
                   
		}); 
                            
});
// BabyParking FINE

// Scontrini Multipli INIZIO
$("#numsco").change(function() {
    if ($("#barcode11").val() == '') {
			alert("ATTENZIONE BARCODE MANCANTE")
				return false; }
             $('#tableNumScontrini').hide();
	    $('#tableNumScontrini').html("");
		$.get('<?= LNK_REQUEST ?>tableNumScontrini.php',{'numsco':$('#numsco').val(),'barcode':$('#barcode11').val(),'application':'concorsi'},function(html){
	 $('#tableNumScontrini').show();
		   $('#tableNumScontrini').html(html);
                 
		}); 
                            
});
// Scontrini Multipli FINE


// Ingressi Vari INIZIO
$("#invio8").click(function() {

    
			if ($("#barcode8").val() == '') {
			alert("ATTENZIONE BARCODE O COGNOME MANCANTE")
			frm8.barcode8.focus();
				return false; }
			if ($("#numero8").val() == '' && $("#numero81").val() == '') {
			alert("ATTENZIONE NUMERO PERSONE MANCANTE")
			frm8.numero8.focus();
				return false; }
				if ($("#ingressi8").val() == '') {
			alert("ATTENZIONE STRUTTURA MANCANTE")
			frm8.ingressi8.focus();
				return false; }
                            
$('#tableIngressiVari').hide();
	    $('#tableIngressiVari').html("");
		$.get('<?= LNK_REQUEST ?>tableIngressiVari.php',{'barcode':$('#barcode8').val(),'numero':$('#numero8').val(),'numero1':$('#numero81').val(),'ingresso':$('#ingressi8').val(),'tempo':$('#tempo8').val(),'application':'concorsi'},function(html){
	 $('#tableIngressiVari').show();
		   $('#tableIngressiVari').html(html);
                    $('#frm8')[0].reset();
                   
		}); 
                            
});

// Ingressi Vari FINE
// BUONI INIZIO

$("#invio13").click(function() {
			if ($("#barcode13").val() == '') {
			alert("ATTENZIONE CODICE FISCALE O BARCODE MANCANTE")
			frm13.barcode13.focus();
			return false; }
			if ($("#numero213").val() == '0' && $("#numero113").val() == '0' && $("#numero13").val() == '0') {
			alert("ATTENZIONE NUMERO BUONI MANCANTE")
			frm213.numero213.focus();
			return false; }
			if ($("#numero113").val() == '0' && $("#numero13").val() == '0') {
			alert("ATTENZIONE NUMERO BUONI MANCANTE")
			frm113.numero113.focus();
			return false; }
			if ($("#numero13").val() == '0' && $("#numero113").val() == null && $("#numero213").val() == null) {
			alert("ATTENZIONE NUMERO BUONI MANCANTE")
			frm13.numero13.focus();
			return false; }
                   
            $('#tableRicevuta').hide();
	    $('#tableRicevuta').html("");
		//console.log($('#barcode13').val());
		
		$.get('<?= LNK_REQUEST ?>tableRicevuta.php',{'barcode':$('#barcode13').val(),'numero':$('#numero13').val(),'numero1':$('#numero113').val(),'numero2':$('#numero213').val(),'nome':$('#nome13').val(),'cognome':$('#cognome13').val(),'nascita':$('#datepicker83').val(),'comune':$('#comune13').val(),'cap':$('#cap13').val(),'application':'concorsi'},function(html){
		$('#tableRicevuta').show();
		   $('#tableRicevuta').html(html);
                  $('#frm13')[0].reset();
                   
		}); 
                            
});

$("#invio14").click(function() { 
		
	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableCarnet').hide();
	    $('#tableCarnet').html("");
		$.get('<?= LNK_REQUEST ?>tableCarnet.php',{'barcode':$('#barcode14').val(),'cognome':$('#cognome14').val(),'application':'concorsi'},function(html){
	 $('#tableCarnet').show();
		   $('#tableCarnet').html(html);
                   $('#frm14')[0].reset();
		}); 
		});

// BUONI FINE

// Configurazioni INIZIO
$("#invio100").click(function() { 
		if (frm100.valore100.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA TABELLA")
frm100.valore100.focus();
return false;
}


	// resetto eventuali errori visualizzati da un click precedente
	    $('#tableConf').hide();
	    $('#tableConf').html("");
		$.get('<?= LNK_REQUEST ?>tableConf_id.php',{'valore':$('#valore100').val(),'application':'concorsi'},function(html){
	 $('#tableConf').show();
		   $('#tableConf').html(html);
                   $('#frm100')[0].reset();
		}); 
		});
// Configurazioni FINE

// Estrazioni INIZIO

		$("#invio_115").click(function() { 
		

	    $('#tableVincitori').hide();
	    $('#tableVincitori').html("");
		$.get('<?= LNK_REQUEST ?>tableVincitori.php',{'id':$('#id').val(),'tipo_premio':$('#tipo_premio').val(),'application':'concorsi'},function(html){
	 $('#tableVincitori').show();
		   $('#tableVincitori').html(html);
               
		}); 
		});
// Estrazioni Fine

// inserimento Foto Inizio
$("#invio25").click(function() {

if ($("#barcode25").val() == '') {
			alert("ATTENZIONE BARCODE MANCANTE")
			frm25.barcode25.focus();
			return false; }
			
			if ($("#foto25").val() == '') {
			alert("ATTENZIONE FOTO MANCANTE")
			frm25.foto25.focus();
			return false; }

            
                  
$('#tableFoto1').hide();
	    $('#tableFoto1').html("");
		$.get('<?= LNK_REQUEST ?>tableFoto1.php',{'barcode':$('#barcode25').val(),'password':$('#password25').val(),'foto':$("#foto25").val(),'application':'concorsi'},function(html){
	 $('#tableFoto1').show();
		   $('#tableFoto1').html(html);
                    $('#frm25')[0].reset();
                   
		}); 
                            
});
// inserimento Foto Fine

// Ricerca foto inizio
		$("#invio23").click(function() { 
		// resetto eventuali errori visualizzati da un click precedente
	    $('#tableFoto').hide();
	    $('#tableFoto').html("");
		$.get('<?= LNK_REQUEST ?>tableFoto.php',{'barcode':$('#barcode23').val(),'application':'concorsi'},function(html){
	 $('#tableFoto').show();
		   $('#tableFoto').html(html);
                   $('#frm23')[0].reset();
		}); 
		});
// ricerca Foto Fine

// Accessi strutture excel INIZIO

		$("#invio80").click(function() { 
		if (frm80.datepicker81.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA DATA INIZIO")
frm80.datepicker81.focus();
return false;
}
if (frm80.datepicker82.value == "")  {
alert("ATTENZIONE DEVI SCEGLIERE UNA DATA FINE")
frm80.datepicker82.focus();
return false;
}
	// resetto eventuali errori visualizzati da un click precedente
	     $('#tableExcel').hide();
	    $('#tableExcel').html("");
		$.get('<?= LNK_REQUEST ?>tableExcel.php',{'data_inizio':$('#datepicker81').val(), 'data_fine':$('#datepicker82').val(), 'settore':$('#settore80').val(),'application':'concorsi'},function(html){
		  $('#tableExcel').show();
                  $('#tableExcel').html(html);
                   $('#frm80')[0].reset();
		}); 
		});

		$("#invio51").click(function() { 
			if (frm51.datepicker95.value == "")  {
	alert("ATTENZIONE DEVI SCEGLIERE UNA DATA")
	frm51.datepicker51.focus();
	return false;
	}
		// resetto eventuali errori visualizzati da un click precedente
		    $('#tableReport51').hide();
		    $('#tableReport51').html("");
			$.get('<?= LNK_REQUEST ?>tableReportTempo.php',{'data':$('#datepicker95').val(),'data1':$('#datepicker96').val(),'hour':$('#hour').val(),'hour1':$('#hour1').val(),'application':'concorsi'},function(html){
		 $('#tableReport51').show();
			   $('#tableReport51').html(html);
	                   $('#frm51')[0].reset();
			}); 
			});

		//Accessi strutture Tempo INIZIO

		$("#invio72").click(function() { 
				// resetto eventuali errori visualizzati da un click precedente
		               
		                  if ($("#cognome72").val() == '') {
					alert("ATTENZIONE INSERISCI UN COGNOME")
					frm72.cognome72.focus();
						return false; }
		            if ($("#persone72").val() == '')  {
					alert("ATTENZIONE INSERISCI UN NUMERO DI PERSONE CORRETTE")
					
						return false; }
		var nomeA = $.param( $( '[name="nomeBB\[\]"]' ) );
		var cognomeA = $.param( $( '[name="cognomeBB\[\]"]' ) );
		var persone = $("#persone72").val(); 
		var cognome = $("#cognome72").val();
		var struttura = $("#struttura72").val();
		var tempo = $("#tempo72").val(); 
		var free = $("#free72").val(); 

		$('#tableTessera71').hide();
			   $.ajax({
		    type: "POST",
		    url: "<?= LNK_REQUEST ?>tableIngressiTempo.php",
		    data: "cognome=" + cognome + "&" + "persone=" + persone + "&" + "struttura=" + struttura + "&" + "tempo=" + tempo + "&" + nomeA + "&" + cognomeA + "&" + "free=" + free,
		    dataType: "html",
		    success: function(msg)
		    {
		    $('#tableTessera71').show();
		    $('#tableTessera71').html(msg);
		    $('#frm72')[0].reset();
		    }
				}); 
				});

		// invio tasso conversione valore
		$("#invio71").click(function() {
		var controlla = frm71.barcode71.value;

		             if ($("#barcode71").val() == '') {
					alert("ATTENZIONE INSERISCI UN BARCODE")
					frm71.barcode71.focus();
						return false; }
		                     if ($("#ingressi71").val() == '')  {
					alert("ATTENZIONE INSERISCI UN NUMERO DI PERSONE CORRETTE")
					
						return false; }
		                          
		var nomeB = $.param( $( '[name="nomeB\[\]"]' ) );
		var cognomeB = $.param( $( '[name="cognomeB\[\]"]' ) );
		var ingressi = $("#ingressi71").val(); 
		var barcode = $("#barcode71").val();
		var struttura = $("#struttura71").val();
		var tempo = $("#tempo71").val();  
		var free = $("#free71").val(); 

		$('#tableTessera72').hide();
			   $.ajax({
		    type: "POST",
		    url: "<?= LNK_REQUEST ?>tableIngressiTempo.php",
		    data: "barcode=" + barcode + "&" + "ingressi=" + ingressi + "&" + "struttura=" + struttura + "&" + "tempo=" + tempo + "&" + nomeB + "&" + cognomeB + "&" + "free=" + free,
		    dataType: "html",
		    success: function(msg)
		    {
		    $('#tableTessera72').show();
		    $('#tableTessera72').html(msg);
		    $('#frm71')[0].reset();
		    }
		    
		  });                           
		});
		//Accessi strutture Tempo FINE
			$("#ingressi71").change(function() { 
		// resetto eventuali errori visualizzati da un click precedente
                
	    $('#tablepersone71').hide();
	    $('#tablepersone71').html("");
		$.get('<?= LNK_REQUEST ?>tablepersone.php',{'persone':$('#ingressi71').val(),'application':'concorsi'},function(html){
	 $('#tablepersone71').show();
		   $('#tablepersone71').html(html);
		}); 
		});

// invio tasso conversione valore
		$("#ingressi72").change(function() { 
		// resetto eventuali errori visualizzati da un click precedente
                
	    $('#tablepersone72').hide();
	    $('#tablepersone72').html("");
		$.get('<?= LNK_REQUEST ?>tablepersone1.php',{'persone':$('#ingressi72').val(),'application':'concorsi'},function(html){
	 $('#tablepersone72').show();
		   $('#tablepersone72').html(html);
		}); 
		});	



		//Recupero Premi INIZIO
				$("#invio52").click(function() { 

					if (frm52.datepicker85.value == "")  {
			alert("ATTENZIONE DEVI SCEGLIERE UNA DATA")
			frm52.datepicker85.focus();
			return false;
			}

					
			if (frm52.table52.value == "N")  {
					
				// resetto eventuali errori visualizzati da un click precedente
				    $('#tableRevert').hide();
				    $('#tableRevert').html("");
					$.get('<?= LNK_REQUEST ?>tableRevertMsisdn.php',{'data':$('#datepicker85').val(),'data1':$('#datepicker86').val(),'hour':$('#hour').val(),'hour1':$('#hour1').val(),'application':'concorsi'},function(html){
				 $('#tableRevert').show();
					   $('#tableRevert').html(html);
			                   $('#frm52')[0].reset();
					}); 
					
				}else{
					
					// resetto eventuali errori visualizzati da un click precedente
				    $('#tableRevert').hide();
				    $('#tableRevert').html("");
					$.get('<?= LNK_REQUEST ?>tableRevertMsisdn_online.php',{'data':$('#datepicker85').val(),'data1':$('#datepicker86').val(),'hour':$('#hour').val(),'hour1':$('#hour1').val(),'application':'concorsi'},function(html){
				 $('#tableRevert').show();
					   $('#tableRevert').html(html);
			                   $('#frm52')[0].reset();
					}); 
					
				}
					
				});
</script> 