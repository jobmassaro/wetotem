<?php
$level_user = SecurityManager::getLoggedInUser("uno")->user_level;
$tabscompleto = Action::ControlloTabs($level_user);
?>
<div id="tabs" class="lessons">
<ul>
<?php
if ($tabscompleto->vendita_buoni) { ?>
<li><a href="#tabs-13">Vendita Buoni</a></li>
<?php }
if ($tabscompleto->elenco_buoni) { ?>
<li><a href="#tabs-14">Elenco Buoni</a></li>
<?php }
if ($tabscompleto->scontrini) { ?>
<li><a href="#tabs-1">Caricamento Crediti</a></li>
<?php }
if ($tabscompleto->scontrini_multi) { ?>
<li><a href="#tabs-11">Caricamento Crediti Multipli</a></li>
<?php }
if ($tabscompleto->nuova_tessera) { ?>
<li><a href="#tabs-2">Nuovo accredito</a></li>
<?php }
if ($tabscompleto->tessera_bambini) { ?>
<li><a href="#tabs-35">Nuova Tessera Bambini</a></li>
<?php }
if ($tabscompleto->nuova_tessera_provvisoria) { ?>
<li><a href="#tabs-32">Accredito</a></li>
<?php }
if ($tabscompleto->nuova_tessera_figli) { ?>
<li><a href="#tabs-43">Nuova Tessera Mista</a></li>
<?php }
if ($tabscompleto->elenco_tessere) { ?>
<li><a href="#tabs-3">Elenco Accreditamento</a></li>
<?php }
if ($tabscompleto->vincite) { ?>
<li><a href="#tabs-4">Controllo vincite</a></li>
<?php }
if ($tabscompleto->vincite_se) { ?>
<li><a href="#tabs-33">Controllo vincite Settimana</a></li>
<?php }
if ($tabscompleto->vincite_we) { ?>
<li><a href="#tabs-30">Controllo vincite WeekEnd</a></li>
<?php }
if ($tabscompleto->vincite_online) { ?>
<li><a href="#tabs-6">Controllo vincite online</a></li>
<?php }
if ($tabscompleto->casellario) { ?>
<li><a href="#tabs-16">Schema casellario</a></li>
<?php }
if ($tabscompleto->casellario_multi) { ?>
<li><a href="#tabs-12">Schema casellario Multipli</a></li>
<?php }
if ($tabscompleto->report) { ?>
<li><a href="#tabs-5">Report giornaliero</a></li>
<?php }
if ($tabscompleto->report_multi) { ?>
<li><a href="#tabs-45">Report giornaliero</a></li>
<?php }
if ($tabscompleto->report_buoni) { ?>
<li><a href="#tabs-15">Report giornaliero Buoni</a></li>
<?php }
if ($tabscompleto->report_ingressi) { ?>
<li><a href="#tabs-9">Report giornaliero Ingressi</a></li>
<?php }
if ($tabscompleto->report_foto) { ?>
<li><a href="#tabs-55">Report Foto</a></li>
<?php }
if ($tabscompleto->report_ingressi_tempo) { ?>
<li><a href="#tabs-51">Report giornaliero Ingressi Tempo</a></li>
<?php }
if ($tabscompleto->baby) { ?>
<li><a href="#tabs-7">Area baby</a></li>
<?php }
if ($tabscompleto->ingressi) { ?>
<li><a href="#tabs-8">Ingressi Strutture</a></li>
<?php }
if ($tabscompleto->ingressi_tempo) { ?>
<li><a href="#tabs-71">Ingressi Strutture a Tempo</a></li>
<?php }
if ($tabscompleto->foto) { ?>
<li><a href="#tabs-25">Inserimento Foto</a></li>
<?php }
if ($tabscompleto->fotoricerca) { ?>
<li><a href="#tabs-23">Ricerca Foto</a></li>
<?php }
if ($tabscompleto->classifica) { ?>
<li><a href="#tabs-26">Inserimento Classifica</a></li>
<?php }
if ($tabscompleto->report_classifica) { ?>
<li><a href="#tabs-27">Report Classifica</a></li>
<?php }
if ($tabscompleto->timer) { ?>
<li><a href="#tabs-21">Timer</a></li>
<?php }
if ($tabscompleto->vita_carta) { ?>
<li><a href="#tabs-22">Vita della carta</a></li>
<?php }
if ($tabscompleto->revert_msisdn) { ?>
<li><a href="#tabs-52">Recupero Premi</a></li>
<?php }
if ($tabscompleto->estrazioni) { ?>
<li><a href="#tabs-20">Estrazione</a></li>
<?php }
if ($tabscompleto->configurazioni) { ?>
<li><a href="#tabs-100">Configurazioni</a></li>
<?php }
if ($tabscompleto->perizia) { ?>
<li><a href="#tabs-200">Perizia</a></li>
<?php } ?>
</ul>
<?php
if ($tabscompleto->vendita_buoni) { 
require_once(PATH_GLOBAL_FORM . "form_tab13.php");
}
if ($tabscompleto->elenco_buoni) { 
require_once(PATH_GLOBAL_FORM . "form_tab14.php");
}
if ($tabscompleto->scontrini) { 
require_once(PATH_GLOBAL_FORM . "form_tab1.php");
}
if ($tabscompleto->scontrini_multi) { 
require_once(PATH_GLOBAL_FORM . "form_tab11.php");
}
if ($tabscompleto->nuova_tessera) { 
require_once(PATH_GLOBAL_FORM . "form_tab2.php");
}
if ($tabscompleto->tessera_bambini) {
require_once(PATH_GLOBAL_FORM . "form_tab35.php");
}
if ($tabscompleto->nuova_tessera_provvisoria) { 
require_once(PATH_GLOBAL_FORM . "form_tab32.php");
}
if ($tabscompleto->nuova_tessera_figli) {
require_once(PATH_GLOBAL_FORM . "form_tab43.php");
}
if ($tabscompleto->elenco_tessere) { 
require_once(PATH_GLOBAL_FORM . "form_tab3.php");
}
if ($tabscompleto->vincite) { 
require_once(PATH_GLOBAL_FORM . "form_tab4.php");
}
if ($tabscompleto->vincite_se) { 
require_once(PATH_GLOBAL_FORM . "form_tab33.php");
}
if ($tabscompleto->vincite_we) { 
require_once(PATH_GLOBAL_FORM . "form_tab30.php");
}
if ($tabscompleto->vincite_online) { 
require_once(PATH_GLOBAL_FORM . "form_tab6.php");
}
if ($tabscompleto->casellario) { 
require_once(PATH_GLOBAL_FORM . "form_tab16.php");
}
if ($tabscompleto->casellario_multi) { 
require_once(PATH_GLOBAL_FORM . "form_tab12.php");
}
if ($tabscompleto->report) { 
require_once(PATH_GLOBAL_FORM . "form_tab5.php");
}
if ($tabscompleto->report_multi) { 
require_once(PATH_GLOBAL_FORM . "form_tab45.php");
}
if ($tabscompleto->report_buoni) { 
require_once(PATH_GLOBAL_FORM . "form_tab15.php");
}
if ($tabscompleto->report_ingressi) { 
require_once(PATH_GLOBAL_FORM . "form_tab9.php");
}
if ($tabscompleto->report_foto) {
require_once(PATH_GLOBAL_FORM . "form_tab55.php");
}
if ($tabscompleto->report_ingressi_tempo) {
	require_once(PATH_GLOBAL_FORM . "form_tab51.php");
}
if ($tabscompleto->baby) { 
require_once(PATH_GLOBAL_FORM . "form_tab7.php");
}
if ($tabscompleto->ingressi) { 
require_once(PATH_GLOBAL_FORM . "form_tab8.php");
}
if ($tabscompleto->ingressi_tempo) {
	require_once(PATH_GLOBAL_FORM . "form_tab71.php");
}
if ($tabscompleto->foto) { 
require_once(PATH_GLOBAL_FORM . "form_tab25.php");
}
if ($tabscompleto->fotoricerca) { 
require_once(PATH_GLOBAL_FORM . "form_tab23.php");
}
if ($tabscompleto->classifica) {
require_once(PATH_GLOBAL_FORM . "form_tab26.php");
}
if ($tabscompleto->report_classifica) {
	require_once(PATH_GLOBAL_FORM . "form_tab27.php");
}
if ($tabscompleto->timer) { 
require_once(PATH_GLOBAL_FORM . "form_tab21.php");
}
if ($tabscompleto->vita_carta) { 
require_once(PATH_GLOBAL_FORM . "form_tab22.php");
}
if ($tabscompleto->estrazioni) { 
require_once(PATH_GLOBAL_FORM . "form_tab20.php");
}
if ($tabscompleto->revert_msisdn) {
require_once(PATH_GLOBAL_FORM . "form_tab52.php");
}
if ($tabscompleto->configurazioni) { 
require_once(PATH_GLOBAL_FORM . "form_tab100.php");
}
if ($tabscompleto->perizia) {
	require_once(PATH_GLOBAL_FORM . "form_tab200.php");
}
?>
</div>
   <script type="text/javascript">
    $(document).ready(function(){
		var e = <?=$param;?> 
		$( "#tabs" ).tabs({selected: e});
		
	});
</script>  
