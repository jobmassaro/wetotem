<?php 

    session_start();
    
    if(!isset($_SESSION['user']))
        header('location: ../index.php');

    $page_title = 'IGIGLI - FORM';
    include ('../includes/header.php');
    $user = $_SESSION['user'];
    $user_leval =  $_SESSION['level'];
    
?>

<div ng-controller="formCtrl">
    <p ng-init="user_leval='<?php echo  $user_leval; ?>'">&nbsp;</p>
        
    <ul class="nav nav-tabs" ng-repeat="tab in tabs.data">
        <li  ng-class="{ active: isSet(1) }" ng-if="tab.vendita_buoni != 0"><a href ng-click="setTab(1)">Vendita Buoni</a></li> 
        <li  ng-class="{ active: isSet(2) }" ng-if="tab.elenco_buoni != 0"><a href ng-click="setTab(2)">Elenco Buoni</a></li>
        <li  ng-class="{ active: isSet(3) }" ng-if="tab.scontrini != 0"><a href="#" ng-click="setTab(3)">Scontrini</a></li>
        <li  ng-class="{ active: isSet(4) }" ng-if="tab.scontrini_multi != 0"><a href ng-click="setTab(4)">Scontrini Multipli</a></li>
        <li  ng-class="{ active: isSet(5) }" ng-if="tab.nuova_tessera != 0"><a href ng-click="setTab(5)">Nuovo Accredito</a></li>
        <li  ng-class="{ active: isSet(6) }" ng-if="tab.tessera_bambini != 0"><a href ng-click="setTab(6)">Tessera Bambini</a></li>
        <li  ng-class="{ active: isSet(7) }" ng-if="tab.nuova_tessera_provvisoria != 0"><a href ng-click="setTab(7)">Nuova Tessera Provvisoria</a></li>
        <li  ng-class="{ active: isSet(8) }" ng-if="tab.nuova_tessera_figli != 0"><a href ng-click="setTab(8)">Nuova Tessera Figli</a></li>
        <li  ng-class="{ active: isSet(9) }" ng-if="tab.elenco_tessere != 0"><a href ng-click="setTab(9)">Elenco Accreditamento</a></li>
        <li  ng-class="{ active: isSet(10) }" ng-if="tab.vincite != 0"><a href ng-click="setTab(10)">Vincite</a></li>
        <li  ng-class="{ active: isSet(11) }" ng-if="tab.vincite_we != 0"><a href ng-click="setTab(11)">Vincite We</a></li>
        <li  ng-class="{ active: isSet(12) }" ng-if="tab.vincite_se != 0"><a href ng-click="setTab(12)">Vincite Se</a></li>
        <li  ng-class="{ active: isSet(13) }" ng-if="tab.vincite_online != 0"><a href ng-click="setTab(13)">Vincite Online</a></li>
        <li  ng-class="{ active: isSet(14) }" ng-if="tab.casellario != 0"><a href ng-click="setTab(14)">Casellario</a></li>
        <li  ng-class="{ active: isSet(15) }" ng-if="tab.casellario_multi != 0"><a href ng-click="setTab(15)">Casellario Multi</a></li>
        <li  ng-class="{ active: isSet(16) }" ng-if="tab.report != 0"><a href ng-click="setTab(16)">Report Baby</a></li>
        <li  ng-class="{ active: isSet(17) }" ng-if="tab.report_multi != 0"><a href ng-click="setTab(17)">Report Multi</a></li>
        <li  ng-class="{ active: isSet(18) }" ng-if="tab.report_buoni != 0"><a href ng-click="setTab(18)">Report giornaliero Buoni</a></li>
        <li  ng-class="{ active: isSet(19) }" ng-if="tab.report_ingressi != 0"><a href ng-click="setTab(19)">Report Ingressi</a></li>
        <li  ng-class="{ active: isSet(20) }" ng-if="tab.report_ingressi_tempo != 0"><a href ng-click="setTab(20)">Ingresso Tempo Libero</a></li>
        <li  ng-class="{ active: isSet(21) }" ng-if="tab.report_foto != 0"><a href ng-click="setTab(21)">Report foto</a></li>
        <li  ng-class="{ active: isSet(22) }" ng-if="tab.baby != 0"><a href ng-click="setTab(22)">Baby</a></li>
        <li  ng-class="{ active: isSet(23) }" ng-if="tab.ingressi != 0"><a href ng-click="setTab(23)">Ingressi</a></li>
        <li  ng-class="{ active: isSet(24) }" ng-if="tab.ingressi_tempo != 0"><a href ng-click="setTab(24)">Ingressi Tempo</a></li>
        <li  ng-class="{ active: isSet(25) }" ng-if="tab.foto != 0"><a href ng-click="setTab(25)">Foto</a></li>
        <li  ng-class="{ active: isSet(26) }" ng-if="tab.fotoricerca != 0"><a href ng-click="setTab(26)">Foto Ricerca</a></li>
        <li  ng-class="{ active: isSet(27) }" ng-if="tab.classifica != 0"><a href ng-click="setTab(27)">Classifica</a></li>
        <li  ng-class="{ active: isSet(28) }" ng-if="tab.report_classifica != 0"><a href ng-click="setTab(28)">Report Classifica</a></li>
        <li  ng-class="{ active: isSet(29) }" ng-if="tab.timer != 0"><a href ng-click="setTab(29)">Timer</a></li>
        <li  ng-class="{ active: isSet(30) }" ng-if="tab.vita_carta != 0"><a href ng-click="setTab(30)">Vita Carta</a></li>
        <li  ng-class="{ active: isSet(31) }" ng-if="tab.estrazioni != 0"><a href ng-click="setTab(31)">Estrazioni</a></li>
        <li  ng-class="{ active: isSet(32) }" ng-if="tab.revert_msisdn != 0"><a href ng-click="setTab(32)">Revert msisdn</a></li>
        <li  ng-class="{ active: isSet(33) }" ng-if="tab.configurazioni != 0"><a href ng-click="setTab(33)">Configurazioni</a></li>
        <li  ng-class="{ active: isSet(34) }" ng-if="tab.perizia != 0"><a href ng-click="setTab(34)">Perizia</a></li>
    </ul>
    
    
  	<div class="jumbotron">
        <!-- vendita_buoni -->
       	<div ng-show="isSet(1)">
         	
             <div ng-include="'../forms/vendita_buoni.php'"></div>
          	
      	</div>

        <!--elenco_buoni  -->
		<div ng-show="isSet(2)">
          <div ng-include="'../forms/elenco_buoni.php'"></div>
     	</div>

         <!--scontrini  -->
        <div ng-show="isSet(3)">
          
     	</div>

         <!--scontrini_multi  -->
        <div ng-show="isSet(4)">
          
     	</div>

         <!--nuova_tessera  -->
        <div ng-show="isSet(5)">
           <div ng-include="'../forms/nuova_tessera.php'"></div>
     	</div>

         <!--tessera_bambini  -->
        <div ng-show="isSet(6)">
          
     	</div>

        <!--nuova_tessera_provvisoria  -->
        <div ng-show="isSet(7)">
          
     	</div>
        
        <!--nuova_tessera_figli  -->
        <div ng-show="isSet(8)">
          
     	</div>
        
        <!--elenco_tessere  -->
        <div ng-show="isSet(9)">
            <div ng-include="'../forms/elenco_tessere.php'"></div>
     	</div>

        <!--vincite  -->
        <div ng-show="isSet(10)">
          
     	</div>
        

         <!--vincite_we  -->
        <div ng-show="isSet(11)">
          
     	</div>

        
        <!--vincite_se  -->
        <div ng-show="isSet(12)">
          
     	</div>

            
        <!--vincite_online  -->
        <div ng-show="isSet(13)">
          
     	</div>

        
         <!--casellario  -->
        <div ng-show="isSet(14)">
          
     	</div>

         <!--casellario_multi  -->
        <div ng-show="isSet(15)">
          
     	</div>

         <!--report  -->
        <div ng-show="isSet(16)">
          <div ng-include="'../forms/report_ingressi.php'"></div>
     	</div>

        <!--report_multi  -->
        <div ng-show="isSet(17)">
          
     	</div>

        <!--report_buoni  -->
        <div ng-show="isSet(18)">

             <div ng-include="'../forms/report_buoni.php'"></div>
          
     	</div>

         <!--report_ingressi  -->
        <div ng-show="isSet(19)">
          
     	</div>

         <!--report_ingressi_tempo  -->
        <div ng-show="isSet(20)">
          
     	</div>

         <!--report_foto  -->
        <div ng-show="isSet(21)">
          
     	</div>

         <!--baby  -->
        <div ng-show="isSet(22)">
            <div ng-include="'../forms/baby_parking_generico.php'"></div>
     	</div>

        <!--ingressi  -->
        <div ng-show="isSet(23)">
          
     	</div>

        <!--ingressi_tempo  -->
        <div ng-show="isSet(24)">
          
     	</div>
        
         <!--foto  -->
        <div ng-show="isSet(25)">
          
     	</div>
        
         <!--fotoricerca  -->
        <div ng-show="isSet(26)">
          
     	</div>

        <!--classifica  -->
        <div ng-show="isSet(27)">
          
     	</div>

         <!--report_classifica  -->
        <div ng-show="isSet(28)">
          
     	</div>

        <!--timer  -->
        <div ng-show="isSet(29)">
          
     	</div>


         <!--vita_carta  -->
        <div ng-show="isSet(30)">
          
     	</div>

        
        <!--estrazioni  -->
        <div ng-show="isSet(31)">
          
     	</div>

        <!--revert_msisdn  -->
        <div ng-show="isSet(32)">
          
     	</div>

         <!--configurazioni  -->
        <div ng-show="isSet(33)">
          
     	</div>

         <!--perizia  -->
        <div ng-show="isSet(34)">
          
     	</div>


         
        
  	
  </div>

</div>


<?php

    include ('../includes/footer.php');

?>

  