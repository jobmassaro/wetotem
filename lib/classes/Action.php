<?php

namespace Models;
use Models\Mysql;


class Action {

   /*public function __construct() 
   {}*/
    
    
  
public static function controllobarcodeacquistati($barcode,$dbc)
{
    $sql = "select sum(carnet) as giocate, sum(carnet1) as giocate1, sum(carnet2) as giocate2 from ".DB_NAME.".".VENDITA." where barcode = '$barcode' and date(data_vendita)=curdate() group by barcode";
	$giocate = new Action();
		/*$rows = mysql::querySelect($sql);
		foreach ($rows as $r) {
			$giocate -> giocate = $r['giocate'];
            $giocate -> giocate1 = $r['giocate1'];
			$giocate -> giocate2 = $r['giocate2'];
		}*/

			$rs = mysqli_query($dbc, $sql);
			if (mysqli_num_rows($rs) > 0) 
			{
				 while ($r = mysqli_fetch_array($rs, MYSQLI_ASSOC))
				 {
					 	$giocate->giocate = $r['giocate'];
            			$giocate->giocate1 = $r['giocate1'];
						$giocate->giocate2 = $r['giocate2'];
				 }

			}

		return $giocate;
    
}






/*Modificata per controllo massimale carnet sul tutta la tabella vendita  */
public static function controlloBarcodeAcquistatiPeriodo($barcode,$dbc)
{
    $sql = "select sum(carnet) as giocate, sum(carnet1) as giocate1, sum(carnet2) as giocate2 from ".DB_NAME.".".VENDITA." where barcode = '$barcode' group by barcode";

	$giocate = new Action();
	/*$rows = mysql::querySelect($sql);
	foreach ($rows as $r) 
	{
		$giocate -> giocate = $r['giocate'];
		$giocate -> giocate1 = $r['giocate1'];
		$giocate -> giocate2 = $r['giocate2'];
	}*/
	$rs = mysqli_query($dbc, $sql);
	if (mysqli_num_rows($rs) > 0) 
	{
			while ($r = mysqli_fetch_array($rs, MYSQLI_ASSOC))
			{
				$giocate->giocate = $r['giocate'];
				$giocate->giocate1 = $r['giocate1'];
				$giocate->giocate2 = $r['giocate2'];
			}

	}

	return $giocate;
    
}

/**/





/*public static function controllobarcodeacquistati1($barcode)
{
    $sql = "select sum(carnet) as giocate, sum(carnet1) as giocate1, sum(carnet2) as giocate2 from ".DB_NAME.".".VENDITA." where barcode = '$barcode' group by barcode";
    $giocate = new Action();

		$rs = mysqli_query($dbc, $sql);
		if (mysqli_num_rows($rs) > 0) 
		{
				while ($r = mysqli_fetch_array($rs, MYSQLI_ASSOC))
				{
					$giocate->giocate = $r['giocate'];
					$giocate->giocate1 = $r['giocate1'];
					$giocate->giocate2 = $r['giocate2'];
				}

		}

		/*$rows = mysql::querySelect($sql);
		foreach ($rows as $r) {
			$giocate -> giocate = $r['giocate'];
            $giocate -> giocate1 = $r['giocate1'];
			$giocate -> giocate2 = $r['giocate2'];
		}
		return $giocate;
    
}*/

public static function controllobarcodeacquistatiwe($barcode)
{
	
	$yesterday = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
	$today =  date("Y-m-d");
	
	$sql = "select sum(carnet) as giocate, sum(carnet1) as giocate1, sum(carnet2) as giocate2 from ".DB_NAME.".".VENDITA." where barcode = '$barcode' and date(data_vendita) in ('$yesterday','$today') group by barcode";
	$giocate = new Action();
	$rs = mysqli_query($dbc, $sql);
	if (mysqli_num_rows($rs) > 0) 
	{
			while ($r = mysqli_fetch_array($rs, MYSQLI_ASSOC))
			{
				$giocate->giocate = $r['giocate'];
				$giocate->giocate1 = $r['giocate1'];
				$giocate->giocate2 = $r['giocate2'];
			}

	}

	/*$rows = mysql::querySelect($sql);
	foreach ($rows as $r) {
		$giocate -> giocate = $r['giocate'];
		$giocate -> giocate1 = $r['giocate1'];
		$giocate -> giocate2 = $r['giocate2'];
	}*/
	return $giocate;

}

	public static function controllosommabarcodeyesterday($barcode) {
	
	$yesterday = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y"))); 
    $today =  date("Y-m-d");
	
	$sql1 = "select count(id) as id from ".DB_NAME.".".SCONTRINO." where barcode = '$barcode' and date(data_caricamento) in ('$yesterday','$today')";
	$result=mysql_query($sql1) or die (mysql_error());
        $rd=mysql_fetch_array($result);
		
		$id = $rd['id'];
		return $id;
	
	}
	
	public static function controllosommabarcodetomorrow($barcode) {
	
	$tomorrow = date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")+1,date("Y")));
    $today =  date("Y-m-d");
	$sql1 = "select count(id) as id from ".DB_NAME.".".SCONTRINO." where barcode = '$barcode' and date(data_caricamento) in ('$today', '$tomorrow')";
	$result=mysql_query($sql1) or die (mysql_error());
        $rd=mysql_fetch_array($result);
		
		$id = $rd['id'];
		return $id;
	}
	
	public static function getEsercizio($esercizio=null) {

		$sql3 = "select insegna, id, scontrino, logo, valminimo, valore from ".DB_NAME.".".PV." ";
		if ($esercizio) $sql3 .= " where id = '$esercizio' "; else $sql3 .= " ORDER BY insegna ASC";
		$results3 = array();
		$rows = mysql::querySelect($sql3);
		foreach ($rows as $r) {
			$concorsi = new Action();
			$concorsi -> insegna = $r['insegna'];
			$concorsi -> id = $r['id'];
			$concorsi -> scontrino = $r['scontrino'];
			$concorsi -> logo = $r['logo'];
			$concorsi -> valminimo = $r['valminimo'];
			$concorsi -> valore = $r['valore'];
			$concorsi -> valminimo_online = $r['valminimo_online'];
			$concorsi -> valore_online = $r['valore_online'];
			$results[] = $concorsi;
		}
	
		return $results;
    }
	
	public static function controlloinsegna($id) {

		$sql3 = "select insegna, valminimo, logo, scontrino, valore from ".DB_NAME.".".PV." where id = '$id'";
						
                  $concorsi = new Action();
                $rows = mysql::querySelect($sql3);
		foreach ($rows as $r) {
			$concorsi -> insegna = $r['insegna'];
			$concorsi -> logo = $r['logo'];
			$concorsi -> scontrino = $r['scontrino'];
			$concorsi -> valminimo = $r['valminimo'];
			$concorsi -> valore = $r['valore'];
			
		}
	
		return $concorsi;
    }
	
	public static function controlloscontrino($importo_mappa,$esercizio_mappa,$numero_mappa,$barcode) {

		$sql = "select barcode from ".DB_NAME.".".SCONTRINO." where importo='$importo_mappa' AND esercizio='$esercizio_mappa' AND numero_scontrino='$numero_mappa' AND barcode='$barcode' AND date(data_caricamento)=curdate()";
		$result=mysql_query($sql) or die (mysql_error());
        $rdb_conta=mysql_num_rows($result);
        return $rdb_conta;
    }
    
    public static function calcolaGiocate_multiple ($totale, $esercizio) {
    	$sql="SELECT valminimo FROM ".DB_NAME.".".PV." where id='$esercizio'";
    	$result=mysql_query($sql) or die (mysql_error());
    	$rd=mysql_fetch_array($result);
    if ($rd['valminimo'])
    {
    	$ns = 0 ;
    	$risultato = $totale/5;
    	$ns = intval($risultato);
    } else {
    	$ns = 0 ;
    	$risultato = $totale/10;
    	$ns = intval($risultato);
    }
    return $ns;
    
    
    }
    public static function calcolaGiocate ($totale, $esercizio) {

		$query3="select * from ".DB_NAME.".".CALCOLO."";
		$result3 = mysql_query($query3) or die (mysql_error());

		while ($rdconcorso=mysql_fetch_array($result3))
	{   
       $da = $rdconcorso['da'];
       $a = $rdconcorso['a'];
       $sql="SELECT valminimo FROM ".DB_NAME.".".PV." where id='$esercizio'";
        $result=mysql_query($sql) or die (mysql_error());
        $rd=mysql_fetch_array($result);
        if ($rd['valminimo'] == 1) $da = $rdconcorso['dam'];
         if ($da != '0.00') {
         if (($totale >= $da ) && ($totale <=$a)) $ns = $rdconcorso['n'];
		 }
	}
	return $ns;

}
public static function calcolaGiocate_online ($totale, $esercizio) {
	/*
	DA € 5.00 A € 30.00 UNA GIOCATA
DA € 30.01 A € 60.00 DUE GIOCATE
DA € 60.01 A € 90.00 TRE GIOCATE
DA € 90.01 A € 120.00 QUATTRO GIOCATE
DA € 120.01 A INFINITO CINQUE GIOCATE 
	*/
        $query3="select * from ".DB_NAME.".".CALCOLO_ONLINE."";
$result3 = mysql_query($query3) or die (mysql_error());

while ($rdconcorso=mysql_fetch_array($result3))
{
    $da = $rdconcorso['da'];
    $a = $rdconcorso['a'];
    
	$sql="SELECT valminimo FROM ".DB_NAME.".".PV." where id='$esercizio'";
	$result=mysql_query($sql) or die (mysql_error());
        $rd=mysql_fetch_array($result);
        if ($rd['valminimo'] == 1) $da = $rdconcorso['dam'];
         if ($da != '0.00') {
         if (($totale >= $da ) && ($totale <=$a)) $ns = $rdconcorso['n'];
		 }
	}
	return $ns;
}
public static function ControlloUovo($crediti)
                
	{
$query3="select uova from ".DB_NAME.".".CALCOLO." where n = '$crediti'";
$result3 = mysql_query($query3) or die (mysql_error());
$rdconcorso=mysql_fetch_array($result3);
$n = $result3['uova'];
return $ns;
}

public static function controlloimporto($barcode, $dbc)
                
	{
		// interroga il motore di gioco per sapere l'esito
            
		$sql1 = "select esercizio, importo, numero_scontrino, id from ".DB_NAME.".".SCONTRINO." where barcode = '$barcode' and date(data_caricamento)=curdate() and giocate_rimaste != '0' LIMIT 1";
     	$giocate = new Action();
		
		
		$rs = mysqli_query($dbc, $sql1);

		if (mysqli_num_rows($rs) > 0) 
		{
				while ($r = mysqli_fetch_array($rs, MYSQLI_ASSOC))
				{
	
				$giocate->importo = $r['importo'];
				$giocate->numero = $r['numero_scontrino'];
				$giocate->id = $r['esercizio'];
				$giocate->settore = $r['id'];
			}
		}
                
		return $giocate;
                
	}

public static function controllobarcode($barcode,$dbc)
{
    $sql = "select barcode from ".DB_NAME.".".ACCREDITAMENTO." where barcode = '$barcode' and eliminata in ('M','N','B','P', 'F')";
	$result = mysqli_query($dbc, $sql);
	$rdb_conta=mysqli_num_rows($result);
	return $rdb_conta;
    
}

public static function controlloscontrini($barcode)
{
    $sql = "select barcode from ".DB_NAME.".".SCONTRINO_ONLINE." where barcode = '$barcode' and date(data_caricamento)=curdate() ";
    $result=mysql_query($sql) or die (mysql_error());
        $rdb_conta=mysql_num_rows($result);
        return $rdb_conta;
    
}

public static function contagiocate($barcode) {

		$sql = "select barcode from ".DB_NAME.".".SCONTRINO." where barcode='$barcode' AND date(data_caricamento)=curdate()";
		$result=mysql_query($sql) or die (mysql_error());
        $rdb_conta=mysql_num_rows($result);
        return $rdb_conta;
    }
	
public static function bloccabarcode($barcode)
{
    $sql = "select barcode from ".DB_NAME.".".ACCREDITAMENTO." where barcode = '$barcode' and blocca = '1' and eliminata in ('M','N')";
    $result=mysql_query($sql) or die (mysql_error());
        $rdb_conta=mysql_num_rows($result);
        return $rdb_conta;
    
}	

public static function controllonumero($numero, $esercizio, $importo)
{
    $sql = "select barcode from ".DB_NAME.".".SCONTRINO_ONLINE." where numero_scontrino = '$numero' and esercizio = '$esercizio' and importo = '$importo'";
    $result=mysql_query($sql) or die (mysql_error());
        $rdb_conta=mysql_num_rows($result);
        return $rdb_conta;
    
}
   public static function getCredits($barcode)
                
	{
		// interroga il motore di gioco per sapere l'esito
            
		$sql1 = "select sum(giocate_rimaste) as giocate from ".DB_NAME.".".SCONTRINO." where barcode = '$barcode' and date(data_caricamento)=curdate()";
                $giocate = new Action();
		$rows = mysql::querySelect($sql1);
		foreach ($rows as $r) {
			$giocate -> giocate = $r['giocate'];
		}
		return $giocate;
                
	}
	
	public static function getCredits_online($barcode)
                
	{
		// interroga il motore di gioco per sapere l'esito
            
		$sql1 = "select sum(giocate_rimaste) as giocate from ".DB_NAME.".".SCONTRINO_ONLINE." where barcode = '$barcode' and date(data_caricamento)=curdate()";
                $giocate = new Action();
		$rows = mysql::querySelect($sql1);
		foreach ($rows as $r) {
			$giocate -> giocate = $r['giocate'];
		}
		return $giocate;
                
	}
	
        
 public static function vincecarrello_online($barcode,$crediti,$importo,$numero,$data,$esercizio)
      
        {
 $sql4 ="INSERT INTO ".DB_NAME.".".GIOCATA_ONLINE." (
barcode,
data,
esito,
carrello,
stampato,
importo_mappa,
numero_mappa,
esercizio
)
VALUES ( 
'$barcode',
'".date('Y-m-d H:i:s')."',
    'VINCE', 
    '$crediti', 
    '0',
	'$importo',
	'$numero',
	'$esercizio'
)";
        $ret = mysql::queryNonSelect($sql4);
            
        }       
        
       
public static function vincecarrello($barcode, $crediti, $importo, $scontrino, $esercizio)
    
        {
	$sql3 = "select we from ".DB_NAME.".".GIORNATA." where giorno=curdate()";
$result3 = mysql_query($sql3) or die (mysql_error());
$rd3=mysql_fetch_array($result3);	

$sql4 ="INSERT INTO ".DB_NAME.".".GIOCATA." (
barcode,
data,
esito,
carrello,
stampato,
we,
importo_mappa,
numero_mappa,
esercizio
)
VALUES ( 
'$barcode',
'".date('Y-m-d H:i:s')."',
    'VINCE', 
    '$crediti', 
    '0',
	'$rd3[we]',
	'$importo',
'$scontrino',
'$esercizio'
	)";

        $ret = mysql::queryNonSelect($sql4);
            
        }
        

        public static function perde($barcode,$crediti)
      
        {
          
            
$sql4 ="INSERT INTO ".DB_NAME.".".GIOCATA." (
barcode,
data,
esito,
carrello,
stampato
)
VALUES ( 
'$barcode',
'".date('Y-m-d H:i:s')."',
    'PERDE', 
    '', 
    '0'
)";
        $ret = mysql::queryNonSelect($sql4);
            
        }
		public static function perde_online($barcode,$crediti)
      
        {
          
            
$sql4 ="INSERT INTO ".DB_NAME.".".GIOCATA_ONLINE." (
barcode,
data,
esito,
carrello,
stampato
)
VALUES ( 
'$barcode',
'".date('Y-m-d H:i:s')."',
    'PERDE', 
    '', 
    '0'
)";
        $ret = mysql::queryNonSelect($sql4);
            
        }
        
        public static function nocrediti($barcode)
      
        {
            
            
            
$sql4 ="INSERT INTO ".DB_NAME.".".GIOCATA." (
barcode,
data,
esito,
carrello,
stampato
)
VALUES ( 
'$barcode',
'".date('Y-m-d H:i:s')."',
    'NOCREDITO', 
    '',
    '0'
)";
        $ret = mysql::queryNonSelect($sql4);
            
        }
        
        public static function errato($barcode)
        
        {
        
        $sql4 ="INSERT INTO ".DB_NAME.".".GIOCATA." (
        	barcode,
        	data,
        	esito,
        	carrello,
        	stampato
        	)
        	VALUES (
        	'$barcode',
        	'".date('Y-m-d H:i:s')."',
    'ERRATO',
    '',
    '0'
)";
        	$ret = mysql::queryNonSelect($sql4);
        
        }
		
		public static function nocrediti_online($barcode)
      
        {
            
            
            
$sql4 ="INSERT INTO ".DB_NAME.".".GIOCATA_ONLINE." (
barcode,
data,
esito,
carrello,
stampato
)
VALUES ( 
'$barcode',
'".date('Y-m-d H:i:s')."',
    'NOCREDITO', 
    '',
    '0'
)";
        $ret = mysql::queryNonSelect($sql4);
            
        }
        
        
       public static function scaricocarrello($data)
      
        { 
        $sql = "select * from ".DB_NAME.".".GIORNATA." where date(giorno) = '$data'";
	    $giocate = new Action();
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $r) {
		                
                        $giocate -> premio1 = $r['premio1'];
                        $giocate -> premio2 = $r['premio2'];
                        $giocate -> premio3 = $r['premio3'];
                        $giocate -> premio4 = $r['premio4'];
                        $giocate -> premio5 = $r['premio5'];
                        $giocate -> premio6 = $r['premio6'];
                        $giocate -> premio7 = $r['premio7'];
                        $giocate -> premio8 = $r['premio8'];
                        $giocate -> premio9 = $r['premio9'];
                        $giocate -> premio10 = $r['premio10'];
						$giocate -> premio11 = $r['premio11'];
                        $giocate -> premio12 = $r['premio12'];
                        $giocate -> premio13 = $r['premio13'];
                        $giocate -> premio14 = $r['premio14'];
                        $giocate -> premio15 = $r['premio15'];
                        $giocate -> premio16 = $r['premio16'];
                        $giocate -> premio17 = $r['premio17'];
                        $giocate -> premio18 = $r['premio18'];
                        $giocate -> premio19 = $r['premio19'];
                        $giocate -> premio20 = $r['premio20'];
                        $giocate -> casellario = $r['casellario'];
						$giocate -> euro = $r['euro'];
                        $giocate -> previsto1 = $r['previsto1'];
                        $giocate -> previsto2 = $r['previsto2'];
                        $giocate -> previsto3 = $r['previsto3'];
                        $giocate -> previsto4 = $r['previsto4'];
						$giocate -> previsto5 = $r['previsto5'];
                        $giocate -> previsto6 = $r['previsto6'];
                        $giocate -> previsto7 = $r['previsto7'];
                        $giocate -> previsto8 = $r['previsto8'];
                        $giocate -> previsto9 = $r['previsto9'];
                        $giocate -> previsto10 = $r['previsto10'];
						$giocate -> previsto11 = $r['previsto11'];
                        $giocate -> previsto12 = $r['previsto12'];
                        $giocate -> previsto13 = $r['previsto13'];
                        $giocate -> previsto14 = $r['previsto14'];
						$giocate -> previsto15 = $r['previsto15'];
                        $giocate -> previsto16 = $r['previsto16'];
                        $giocate -> previsto17 = $r['previsto17'];
                        $giocate -> previsto18 = $r['previsto18'];
                        $giocate -> previsto19 = $r['previsto19'];
                        $giocate -> previsto20 = $r['previsto20'];
                        $giocate -> casellariop = $r['casellariop'];
						$giocate -> europ = $r['europ'];
						$giocate -> tipo = $r['tipo'];
						$giocate -> totale = $r['totale'];
                        $giocate -> completo = $r['completo'];
                        $giocate -> giorno = $r['giorno'];
                        $giocate -> video = $r['video'];
                        $giocate -> totem = $r['totem'];
						$giocate -> gioco = $r['gioco'];
						$giocate -> ora_apertura = $r['ora_apertura'];
						$giocate -> ora_chiusura = $r['ora_chiusura'];
						$giocate -> recuperato = $r['recuperato'];
						
                }
                
                return  $giocate;
        }
        
        public static function scaricocarrello_pass($data)
        
        {
        	$sql = "select * from ".DB_NAME.".".GIORNATA_PASS." where date(giorno) = '$data'";
        	$giocate = new Action();
        	$rows1 = mysql::querySelect($sql);
        	foreach ($rows1 as $r) {
        
        		$giocate -> giorno = $r['giorno'];
        		$giocate -> video = $r['video'];
        		$giocate -> ora_apertura = $r['ora_apertura'];
        		$giocate -> ora_chiusura = $r['ora_chiusura'];
        
        	}
        
        	return  $giocate;
        }
        
		public static function scaricocarrello_online($data)
      
        { 
        $sql = "select * from ".DB_NAME.".".GIORNATA_ONLINE." where date(giorno)='$data'";
	      $concorsi = new Action();
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $g) {
			
			
            $concorsi -> premio1= $g['premio1'];
            $concorsi -> premio2= $g['premio2'];
            $concorsi -> premio3= $g['premio3'];
            $concorsi -> premio4= $g['premio4'];
            $concorsi -> premio5= $g['premio5'];
            $concorsi -> previsto1= $g['previsto1'];
            $concorsi -> previsto2= $g['previsto2'];
            $concorsi -> previsto3= $g['previsto3'];
            $concorsi -> previsto4= $g['previsto4'];
            $concorsi -> previsto5= $g['previsto5'];
			$concorsi -> tipo = $g['tipo'];
			$concorsi -> totale = $g['totale'];
            $concorsi -> giorno = $g['giorno'];
            $concorsi -> video = $g['video'];
            $concorsi -> totem = $g['totem'];
            $concorsi -> casellario = $g['casellario'];
            $concorsi -> casellariop = $g['casellariop'];
            $concorsi -> ora_apertura = $g['ora_apertura'];
            $concorsi -> ora_chiusura = $g['ora_chiusura'];
            $concorsi -> recuperato = $g['recuperato'];
                }
                
                return $concorsi;
        }
        
        
        
		 public static function scaricocarrello_completo($data)
      
       { 
        $sql = "select * from ".DB_NAME.".".GIORNATA." where date(giorno)='$data'";
	    $giocate = new Action();
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $r) {
		                
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio1'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio1 = $r['premio1']; else $giocate -> premio1 = null;
                        $sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio2'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio2 = $r['premio2']; else $giocate -> premio2 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio3'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio3 = $r['premio3']; else $giocate -> premio3 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio4'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio4 = $r['premio4']; else $giocate -> premio4 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio5'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio5 = $r['premio5']; else $giocate -> premio5 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio6'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio6 = $r['premio6']; else $giocate -> premio6 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio7'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio7 = $r['premio7']; else $giocate -> premio7 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio8'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio8 = $r['premio8']; else $giocate -> premio8 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio9'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio9 = $r['premio9']; else $giocate -> premio9 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio10'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio10 = $r['premio10']; else $giocate -> premio10 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio11'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio11 = $r['premio11']; else $giocate -> premio11 = null;
                        $sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio12'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio12 = $r['premio12']; else $giocate -> premio12 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio13'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio13 = $r['premio13']; else $giocate -> premio13 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio14'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio14 = $r['premio14']; else $giocate -> premio14 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio15'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio15 = $r['premio15']; else $giocate -> premio15 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio16'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio16 = $r['premio16']; else $giocate -> premio16 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio17'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio17 = $r['premio17']; else $giocate -> premio17 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio18'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio18 = $r['premio18']; else $giocate -> premio18 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio19'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio19 = $r['premio19']; else $giocate -> premio19 = null;
						$sql1 = "select completo from ".DB_NAME.".".PREMIO." where nome='premio20'";
						$result = mysql_query($sql1) or die (mysql_error());
						$rd=mysql_fetch_array($result);
						if ($rd['completo']) $giocate -> premio20 = $r['premio20']; else $giocate -> premio20 = null;
                        $giocate -> casellario = $r['casellario'];
						$giocate -> euro = $r['euro'];
                        $giocate -> previsto1 = $r['previsto1'];
                        $giocate -> previsto2 = $r['previsto2'];
                        $giocate -> previsto3 = $r['previsto3'];
                        $giocate -> previsto4 = $r['previsto4'];
						$giocate -> previsto5 = $r['previsto5'];
                        $giocate -> previsto6 = $r['previsto6'];
                        $giocate -> previsto7 = $r['previsto7'];
                        $giocate -> previsto8 = $r['previsto8'];
                        $giocate -> previsto9 = $r['previsto9'];
                        $giocate -> previsto10 = $r['previsto10'];
						$giocate -> previsto11 = $r['previsto11'];
                        $giocate -> previsto12 = $r['previsto12'];
                        $giocate -> previsto13 = $r['previsto13'];
                        $giocate -> previsto14 = $r['previsto14'];
						$giocate -> previsto15 = $r['previsto15'];
                        $giocate -> previsto16 = $r['previsto16'];
                        $giocate -> previsto17 = $r['previsto17'];
                        $giocate -> previsto18 = $r['previsto18'];
                        $giocate -> previsto19 = $r['previsto19'];
                        $giocate -> previsto20 = $r['previsto20'];
                        $giocate -> casellariop = $r['casellariop'];
						$giocate -> totale = $r['totale'];
                        $giocate -> giorno = $r['giorno'];
						$giocate -> europ = $r['europ'];
						$giocate -> tipo = $r['tipo'];
                        $giocate -> completo = $r['completo'];
                        $giocate -> giorno = $r['giorno'];
                        $giocate -> video = $r['video'];
                        $giocate -> totem = $r['totem'];
						$giocate -> gioco = $r['gioco'];
						$giocate -> ora_apertura = $r['ora_apertura'];
						$giocate -> ora_chiusura = $r['ora_chiusura'];
						$giocate -> recuperato = $r['recuperato'];
						
                }
                
                return  $giocate;
        }
	
	   	public static function ControlloCompleto($dbc)
		{ 
			$sql = "select * from ".DB_NAME.".".CONCORSO."";
			$giocate = new Action();
			
			//$rows1 = Mysql::querySelect($sql);
			$rs = mysqli_query($dbc, $sql);
			//$uid = rand();
			if (mysqli_num_rows($rs) > 0) 
			{
				 while ($r = mysqli_fetch_array($rs, MYSQLI_ASSOC))
				 {
					 	
						 	$giocate->nome = $r['nome'];
							$giocate->foto = $r['foto'];
							$giocate->card = $r['card'];
							$giocate->email = $r['email'];
							$giocate->sito = $r['sito'];
							$giocate->privacy = $r['privacy'];
							$giocate->totem = $r['totem'];
							$giocate->carnet1 = $r['carnet1'];
							$giocate->carnet2 = $r['carnet2'];
							$giocate->carnet3 = $r['carnet3'];
							$giocate->prezzo1 = $r['prezzo1'];
							$giocate->prezzo2 = $r['prezzo2'];
							$giocate->prezzo3 = $r['prezzo3'];
							$giocate->valore1 = $r['valore1'];
							$giocate->valore2 = $r['valore2'];
							$giocate->valore3 = $r['valore3'];
							$giocate->numero1 = $r['numero1'];
							$giocate->numero2 = $r['numero2'];
							$giocate->numero3 = $r['numero3'];
							$giocate->swf = $r['swf'];
							$giocate->swf_pass = $r['swf_pass'];
							$giocate->swf_online = $r['swf_online'];
							$giocate->max1 = $r['max1'];
							$giocate->max2 = $r['max2'];
							$giocate->max3 = $r['max3'];
							$giocate->maxtot = $r['maxtot'];
							$giocate->stamparicevuta = $r['stamparicevuta'];
							$giocate->codbar = $r['codbar'];
							$giocate->nomebar = $r['nomebar'];
							$giocate->voto = $r['voto'];
							$giocate->uovo = $r['uovo'];
							$giocate->numerouova = $r['numerouova'];
							$giocate->numerocaselle = $r['numerocaselle'];
							$giocate->casellario_multi = $r['casellario_multi'];
							$giocate->vinciscontrino = $r['vinciscontrino'];
							$giocate->rimborso = $r['rimborso'];
							$giocate->arrotonda = $r['arrotonda'];
                            $giocate->contascontrini = $r['contascontrini'];
							$giocate->insscontrini = $r['insscontrini'];
							$giocate->giornocarnet = $r['giornocarnet'];
							$giocate->numscontrini = $r['numscontrino'];
							$giocate->buoniTot = $r['buoniTot'];
							$giocate->passaggio = $r['passaggio'];
							$giocate->premiononassegnato = $r['premiononassegnato'];
							$giocate->stampavalorescontrino = $r['stampavalorescontrino'];
							$giocate->datanumero = $r['datanumero'];
							$giocate->scontrinoRisto = $r['scontrinoRisto'];
							$giocate->scontrinoGalle = $r['scontrinoGalle'];
							$giocate->settimana = $r['settimana'];
							$giocate->quesito = $r['quesito'];
							$giocate->passaggio_insieme = $r['passaggio_insieme'];

					 }
				}
					
				return  $giocate;
			}
			
			public static function ControlloQuesito()
			
			{
				$sql = "select * from ".DB_NAME.".".QUESITO."";
				$giocate = new Action();
				$rs = mysqli_query($dbc, $sql);
				//$uid = rand();
				if (mysqli_num_rows($rs) > 0) 
				{
					while ($r = mysqli_fetch_array($rs, MYSQLI_ASSOC))
					{
						$giocate->domanda1 = $r['domanda1'];
						$giocate->domanda2 = $r['domanda2'];
						$giocate->domanda3 = $r['domanda3'];
						$giocate->domanda4 = $r['domanda4'];
						$giocate->domanda5 = $r['domanda5'];
					}
				}


				/*$rows1 = mysql::querySelect($sql);
				foreach ($rows1 as $r) {
						
					$giocate -> domanda1 = $r['domanda1'];
					$giocate -> domanda2 = $r['domanda2'];
					$giocate -> domanda3 = $r['domanda3'];
					$giocate -> domanda4 = $r['domanda4'];
					$giocate -> domanda5 = $r['domanda5'];
					
				}*/
					
				return  $giocate;
			}
			
			public static function ControlloQuesito_select($domanda) {
				$sql1 = "select count(id) as id from ".DB_NAME.".".QUESITO_SELECT." where domande='$domanda'";
				$giocate = new Action();
				$rs = mysqli_query($dbc, $sql1);
				//$uid = rand();
				if (mysqli_num_rows($rs) > 0) 
				{
					while ($r = mysqli_fetch_array($rs, MYSQLI_ASSOC))
					{
						   	$giocate -> valore = $r['id'];			
					}
				}
			   /*$rows1 = mysql::querySelect($sql1);
			   foreach ($rows1 as $r) {
			   	$giocate -> valore = $r['id'];
			   	}*/
			   		
			   	return  $giocate;
			
			}
			
			public static function ControlloTabs($level_user)
		  
			{ 
			$sql = "select * from ".DB_NAME.".".TABS." where user_level = '$level_user'";
			$giocate = new Action();
			$rows1 = mysql::querySelect($sql);
			foreach ($rows1 as $r) {
							
							$giocate -> vendita_buoni = $r['vendita_buoni'];
							$giocate -> elenco_buoni = $r['elenco_buoni'];
							$giocate -> scontrini = $r['scontrini'];
							$giocate -> scontrini_multi = $r['scontrini_multi'];
							$giocate -> nuova_tessera = $r['nuova_tessera'];
							$giocate -> tessera_bambini = $r['tessera_bambini'];
							$giocate -> nuova_tessera_provvisoria = $r['nuova_tessera_provvisoria'];
							$giocate -> nuova_tessera_figli = $r['nuova_tessera_figli'];
							$giocate -> elenco_tessere = $r['elenco_tessere'];
							$giocate -> vincite = $r['vincite'];
							$giocate -> vincite_we = $r['vincite_we'];
							$giocate -> vincite_se = $r['vincite_se'];
							$giocate -> vincite_online = $r['vincite_online'];
							$giocate -> casellario = $r['casellario'];
							$giocate -> casellario_multi = $r['casellario_multi'];
							$giocate -> report = $r['report'];
							$giocate -> report_multi = $r['report_multi'];
							$giocate -> report_buoni = $r['report_buoni'];
							$giocate -> report_ingressi = $r['report_ingressi'];
							$giocate -> report_ingressi_tempo = $r['report_ingressi_tempo'];
							$giocate -> report_foto = $r['report_foto'];
							$giocate -> baby = $r['baby'];
							$giocate -> ingressi = $r['ingressi'];
							$giocate -> ingressi_tempo = $r['ingressi_tempo'];
							$giocate -> foto = $r['foto'];
							$giocate -> fotoricerca = $r['fotoricerca'];
							$giocate -> classifica = $r['classifica'];
							$giocate -> report_classifica = $r['report_classifica'];
							$giocate -> timer = $r['timer'];
							$giocate -> vita_carta = $r['vita_carta'];
							$giocate -> estrazioni = $r['estrazioni'];
							$giocate -> revert_msisdn = $r['revert_msisdn'];
							$giocate -> configurazioni = $r['configurazioni'];
							$giocate -> perizia = $r['perizia'];
					}
					
					return  $giocate;
			}
	    public static function video($video)
      
        { 
        $sql = "select * from ".DB_NAME.".".VIDEO." where video = '$video'";
	      $concorsi = new Action();
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $g) {
			
			
            $concorsi -> gioca= $g['gioca'];
            $concorsi -> haivinto= $g['haivinto'];
            $concorsi -> nonhaivinto= $g['nonhaivinto'];
            $concorsi -> urlgioca= $g['urlgioca'];
            $concorsi -> urlhaivinto= $g['urlhaivinto'];
            $concorsi -> urlnonhaivinto= $g['urlnonhaivinto'];
            $concorsi -> chiuso= $g['chiuso'];
            $concorsi -> credito= $g['credito'];
            $concorsi -> errore= $g['errore'];
			$concorsi -> lettura= $g['lettura'];
			$concorsi -> urlchiuso= $g['urlchiuso'];
            $concorsi -> urlcredito= $g['urlcredito'];
            $concorsi -> urlerrore= $g['urlerrore'];
			$concorsi -> urllettura= $g['urllettura'];
                }
                
         return $concorsi;
        }
        
        
		
        public static function controllo($barcode)
      
        { 
        
        
              $sql = "select id from ".DB_NAME.".".GIOCATA." where barcode = '$barcode' and date(data)=curdate() and esito ='VINCE' ";
              $results1 = array();
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $g) {
			
						$concorsi = new Action();
                        $concorsi -> id = $g['id'];
                        $results1[] = $concorsi;
                }
                
                return $results1;
           
           
        }
		
        
        
         public static function controllo_online($barcode)
      
        { 
        
        
              $sql = "select id from ".DB_NAME.".".GIOCATA_ONLINE." where barcode = '$barcode' and date(data)=curdate() and esito ='VINCE' ";
              $results1 = array();
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $g) {
			
			$concorsi = new Action();
                        $concorsi -> id = $g['id'];
                        $results1[] = $concorsi;
                }
                
                return $results1;
           
           
        }
       
         public static function scarico($barcode)
      
        { 
        
        
           $sql = "select id, giocate_rimaste from ".DB_NAME.".".SCONTRINO." where barcode = '$barcode' and date(data_caricamento)=curdate()";
              $results1 = array();
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $g) {
			$concorsi = new Action();
			$concorsi -> giocate = $g['giocate_rimaste'];
                        $concorsi -> id = $g['id'];
                        $results1[] = $concorsi;
                }
                
                return $results1;
           
           
        }
        
        public static function scarico_online($barcode)
      
        { 
        
        
           $sql = "select id, giocate_rimaste from ".DB_NAME.".".SCONTRINO_ONLINE." where barcode = '$barcode' and date(data_caricamento)=curdate()";
              $results1 = array();
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $g) {
			$concorsi = new Action();
			$concorsi -> giocate = $g['giocate_rimaste'];
                        $concorsi -> id = $g['id'];
                        $results1[] = $concorsi;
                }
                
                return $results1;
           
           
        }
        

		
		public static function calcolacoupon ($barcode)
      
        {
      
  $sql = "select count(barcode) as barcode from ".DB_NAME.".".COUPON." where barcode = '$barcode'";          
  $result=mysql_query($sql) or die (mysql_error());
 $rdb=mysql_fetch_array($result);
$codice =  $rdb['barcode'];
        return $codice;   
        }
		
public static function sommascontrini ($barcode)
      
        {
      
  $sql = "select importo from ".DB_NAME.".".SCONTRINO." where barcode = '$barcode' order by data_caricamento DESC LIMIT 1";          
  $result=mysql_query($sql) or die (mysql_error());
 $rdb=mysql_fetch_array($result);
$importo =  $rdb['importo']/100;
return $importo;   
        }
		
public static function utilizzato_online($barcode,$crediti)
      
        {
 $sql4 ="INSERT INTO ".DB_NAME.".".GIOCATA_ONLINE." (
barcode,
data,
esito,
carrello,
casellario,
stampato
)
VALUES ( 
'$barcode',
'".date('Y-m-d H:i:s')."',
    'UTILIZZATO', 
    '',
    '$crediti', 
    '0'
)";
        $ret = mysql::queryNonSelect($sql4);
            
        }
       
	public static function tessere ($data, $dbc) {
        
        	$sql1 = "select count(id) as giocate from ".DB_NAME.".".ACCREDITAMENTO." where date('$data')=date(data)";
            $giocate = new Action();
			
			$rs = mysqli_query($dbc, $sql1);
			//$uid = rand();
			if (mysqli_num_rows($rs) > 0) 
			{
				 while ($r = mysqli_fetch_array($rs, MYSQLI_ASSOC))
				 {
					$giocate->giocate = $r['giocate'];
				 }
			}

		return $giocate;
        
   
    }
  
    public static function tesseregiocata ($data) {

        
        $sql1 = "select count(*) as id, d.barcode from ".DB_NAME.".".ACCREDITAMENTO." c inner join ".DB_NAME.".".GIOCATA." d on d.barcode = c.barcode where date('$data')=date(d.data) group by d.barcode";
        $result=mysql_query($sql1) or die (mysql_error());
        $giocate=mysql_num_rows($result);
        return  $giocate;
        
   
    }

    
    public static function giocate ($data) {
        
        $sql3 = "select count(id) as giocate from ".DB_NAME.".".GIOCATA." where esito != 'NOCREDITO' and esito != 'ERRORE' and date('$data')=date(data)";
                $giocate = new Action();
		$rows = mysql::querySelect($sql3);
		foreach ($rows as $r) {
			$giocate -> giocate = $r['giocate'];
		}
		return $giocate;

 }
    
    public static function nscontrini ($data, $valore) {
        
        $sql1 = "select count(a.id) as giocate from ".DB_NAME.".".SCONTRINO." a inner join ".DB_NAME.".".PV." b on a.esercizio = b.id where b.valminimo = '$valore' and date(a.data_caricamento)= '$data'";
                $giocate = new Action();
		$rows = mysql::querySelect($sql1);
		foreach ($rows as $r) {
			$giocate -> giocate = $r['giocate'];
		}
		return $giocate;
        
   
    }
    
    public static function valorescontrini ($data, $valore) {
        
        $sql1 = "select sum(a.importo) as giocate from ".DB_NAME.".".SCONTRINO." a inner join ".DB_NAME.".".PV." b on a.esercizio = b.id where b.valminimo = '$valore' and date(a.data_caricamento)= '$data'";
                $giocate = new Action();
		$rows = mysql::querySelect($sql1);
		foreach ($rows as $r) {
			$giocate -> giocate = $r['giocate'];
		}
		return $giocate;
        
   
    }	
	
	public static function nscontrini_m ($data, $valore) {
        
        $sql1 = "select count(a.id) as giocate from ".DB_NAME.".".SCONTRINI." a inner join ".DB_NAME.".".PV." b on a.esercizio = b.id where b.valminimo = '$valore' and date(a.data_caricamento)= '$data'";
                $giocate = new Action();
		$rows = mysql::querySelect($sql1);
		foreach ($rows as $r) {
			$giocate -> giocate = $r['giocate'];
		}
		return $giocate;
        
   
    }
    
    public static function valorescontrini_m ($data, $valore) {
        
        $sql1 = "select sum(a.importo) as giocate from ".DB_NAME.".".SCONTRINI." a inner join ".DB_NAME.".".PV." b on a.esercizio = b.id where b.valminimo = '$valore' and date(a.data_caricamento)= '$data'";
                $giocate = new Action();
		$rows = mysql::querySelect($sql1);
		foreach ($rows as $r) {
			$giocate -> giocate = $r['giocate'];
		}
		return $giocate;
        
   
    }
	 public static function ultimagiocata ($data) {
        
        $sql3 = "select data from ".DB_NAME.".".GIOCATA." where date('$data')=date(data) ORDER by data DESC LIMIT 1";
        $giocate = new Action();
                
		$rows = mysql::querySelect($sql3);
		foreach ($rows as $r) {
                    
			$giocate -> data = $r['data'];
                     
                        
		}
	
		return $giocate;

   
    }
    
    public static function giocate_online ($data) {
    
    	$sql3 = "select count(id) as giocate from ".DB_NAME.".".GIOCATA_ONLINE." where esito != 'NOCREDITO' and esito != 'ERRORE' and date('$data')=date(data)";
    	$giocate = new Action();
    	$rows = mysql::querySelect($sql3);
    	foreach ($rows as $r) {
    		$giocate -> giocate = $r['giocate'];
    	}
    	return $giocate;
    
    }
    
    
    public static function nscontrini_online ($data, $valore) {
    
    	$sql1 = "select count(a.id) as giocate from ".DB_NAME.".".SCONTRINO_ONLINE." a inner join ".DB_NAME.".".PV." b on a.esercizio = b.id where b.valminimo = '$valore' and date(a.data_caricamento)= '$data'";
    	$giocate = new Action();
    	$rows = mysql::querySelect($sql1);
    	foreach ($rows as $r) {
    		$giocate -> giocate = $r['giocate'];
    	}
    	return $giocate;
    
    	 
    }
    
    public static function valorescontrini_online ($data, $valore) {
    
    	$sql1 = "select sum(a.importo) as giocate from ".DB_NAME.".".SCONTRINO_ONLINE." a inner join ".DB_NAME.".".PV." b on a.esercizio = b.id where b.valminimo = '$valore' and date(a.data_caricamento)= '$data'";
    	$giocate = new Action();
    	$rows = mysql::querySelect($sql1);
    	foreach ($rows as $r) {
    		$giocate -> giocate = $r['giocate'];
    	}
    	return $giocate;
    
    	 
    }
    public static function ultimagiocata_online ($data) {
    
    	$sql3 = "select data from ".DB_NAME.".".GIOCATA_ONLINE." where date('$data')=date(data) ORDER by data DESC LIMIT 1";
    	$giocate = new Action();
    
    	$rows = mysql::querySelect($sql3);
    	foreach ($rows as $r) {
    
    		$giocate -> data = $r['data'];
    		 
    
    	}
    
    	return $giocate;
    
    	 
    }
    
    public static function coupone ($data) {

        
        $sql1 = "select count(*) as id, barcode from ".DB_NAME.".".CODICEONLINE." where date('$data')=date(data_registrazione) group by barcode";
        $result=mysql_query($sql1) or die (mysql_error());
                $giocate=mysql_num_rows($result);
        return  $giocate;
        
   
    }
	
	public static function premipremi ($premio) {
        
        $sql3 = "select premio from ".DB_NAME.".".PREMIO." where nome = '$premio'";
        $giocate = new Action();
        $rows = mysql::querySelect($sql3);
		foreach ($rows as $r) {
                    $giocate -> nome = $r['premio'];
		}
	  return $giocate;
 }
 
 public static function numeropremi () {
 
 	$sql3 = "select id from ".DB_NAME.".".PREMIO." order by id DESC limit 1";
 	$giocate = new Action();
 	$rows = mysql::querySelect($sql3);
 	foreach ($rows as $r) {
 		$giocate -> nome = $r['id'];
 	}
 	return $giocate;
 }
 
 public static function premipremi_online ($premio) {
        
        $sql3 = "select premio from ".DB_NAME.".".PREMIO_ONLINE." where nome = '$premio'";
        $giocate = new Action();
                
		$rows = mysql::querySelect($sql3);
		foreach ($rows as $r) {
                    $giocate -> nome = $r['premio'];
		}
	  return $giocate;
 }
	 public static function getCasellario_multi($data) {
    
         $sql = "select casellario from ".DB_NAME.".".GIOCATA." where esito = 'VINCE' and date('$data')=date(data)";
						
		$results = array();
		$rows = mysql::querySelect($sql);
		foreach ($rows as $r) {
			$concorsi = new Action();
			$concorsi -> settore = $r['casellario'];
			$results[] = $concorsi;
		}
	return $results;
    }
    public static function getCasellario1_multi() {
    
         $sql = "select casellario from ".DB_NAME.".".GIOCATA." where esito = 'VINCE' and curdate()=date(data)";
						
		$results = array();
		$rows = mysql::querySelect($sql);
		foreach ($rows as $r) {
			$concorsi = new Action();
			$concorsi -> settore = $r['casellario'];
			$results[] = $concorsi;
		}
	return $results;
    }
	public static function getCasellario() {
    
         $sql = "select casellario from ".DB_NAME.".".GIOCATA." where esito = 'VINCE'";
						
		$results = array();
		$rows = mysql::querySelect($sql);
		foreach ($rows as $r) {
			$concorsi = new Action();
			$concorsi -> settore = $r['casellario'];
			$results[] = $concorsi;
		}
	return $results;
    }
    public static function getCasellario1() {
    
         $sql = "select casellario from ".DB_NAME.".".GIOCATA." where esito = 'VINCE'";
						
		$results = array();
		$rows = mysql::querySelect($sql);
		foreach ($rows as $r) {
			$concorsi = new Action();
			$concorsi -> settore = $r['casellario'];
			$results[] = $concorsi;
		}
	return $results;
    }
    
     public static function getunicoCasellario($barcode)
                
	{
		// interroga il motore di gioco per sapere l'esito
            
		$sql = "select barcode from ".DB_NAME.".".GIOCATA." where esito = 'VINCE' and barcode ='$barcode' and curdate()=date(data)";
         $result=mysql_query($sql) or die (mysql_error());
        $rdb_conta=mysql_num_rows($result); 
            return $rdb_conta;    
	}     
        
       
public static function vincecasella($barcode,$crediti)
     {
	 	$sql3 = "select we from ".DB_NAME.".".GIORNATA." where giorno=curdate()";
$result3 = mysql_query($sql3) or die (mysql_error());
$rd3=mysql_fetch_array($result3);	
	 
 $sql4 ="INSERT INTO ".DB_NAME.".".GIOCATA." (
barcode,
data,
esito,
carrello,
casellario,
stampato,
we
)
VALUES ( 
'$barcode',
'".date('Y-m-d H:i:s')."',
    'VINCE', 
    '', 
    '',
    '0',
	'$rd3[we]'	
)";
        $ret = mysql::queryNonSelect($sql4);
            
        }
		public static function scaricocasella()
      
        { 
        
              $sql = "select casellario, giorno from ".DB_NAME.".".GIORNATA." where date(giorno)=curdate()";
              $results1 = array();
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $g) {
			
			$concorsi = new Action();
			$concorsi -> premio = $g['casellario'];
                        $concorsi -> giorno = $g['giorno'];
                        $results1[] = $concorsi;
                }
                
                return $results1;
           
        }
        
        public static function residuocasella()
      
        { 
               $sql = "select casellario from ".DB_NAME.".".GIORNATA." where date(giorno)=curdate()";
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $g) {
			$concorsi = new Action();
                        $concorsi -> casellario = $g['casellario'];
                }
                return $concorsi;
           
           
        }
        
         public static function controllocarnet($barcode) {
    
         $sql = "select numero from ".DB_NAME.".".VENDITA." where data=curdate()";
	$result=mysql_query($sql) or die (mysql_error());
        $rdb_conta=mysql_num_rows($result);
        return $rdb_conta;
    }
    public static function ricevuta()
      
        { 
              $sql = "select id from ".DB_NAME.".".VENDITA." order by id DESC";
              $result=mysqli_query($dbc,$sql);
              $rdb=mysqli_fetch_array($result,MYSQLI_ASSOC);
              return $rdb['id'];
           
        }
        
        public static function buoni ($data) {

        
        $sql = "select sum(carnet) as giocate, sum(carnet1) as giocate1 from ".DB_NAME.".".VENDITA." where date(data_vendita)=date('$data')";
    $giocate = new Action();
		$rows = mysql::querySelect($sql);
		foreach ($rows as $r) {
			$giocate -> giocate = $r['giocate'];
			$giocate -> giocate1 = $r['giocate1'];
		}
		return $giocate;
        
   
    }
	public static function attrazioni ($settore) {
        
        $sql1 = "select SUM(ingresso_bambini) as numero, SUM(ingresso_adulti) as numero1 from ".DB_NAME.".".ACCESSO." where settore = '$settore'";
                $giocate = new Action();
		$rows = mysql::querySelect($sql1);
		foreach ($rows as $r) {
			$giocate -> numero = $r['numero'];
			$giocate -> numero1 = $r['numero1'];
		}
		return $giocate;
        
   
    }
	
	public static function CompletoControllo () {
		$sql1 = "select completo from ".DB_NAME.".".GIORNATA." where date(giorno)=curdate()";
         $giocate = new Action();
		$rows = mysql::querySelect($sql1);
		foreach ($rows as $r) {
			$giocate -> completo = $r['completo'];
		}
		return $giocate;
	
        }

	
	public static function domanda ($id) {
		$sql1 = "select * from ".DB_NAME.".".ANSWER." where ordine = '$id' order by RAND LIMIT 1";
         $giocate = new Action();
		$rows = mysql::querySelect($sql1);
		foreach ($rows as $r) {
			$giocate -> domanda = $r['domanda'];
			$giocate -> risposta = $r['risposta'];
		}
		return $giocate;
	
        }
		
		public static function ControlloPerizia()
		  
			{ 
			$sql = "select * from ".DB_NAME.".".PERIZIA."";
			$giocate = new Action();
			$rows1 = mysql::querySelect($sql);
			foreach ($rows1 as $r) {
							
							$giocate -> promotrice = $r['promotrice'];
							$giocate -> soggetto = $r['soggetto'];
							$giocate -> area = $r['area'];
							$giocate -> durata = $r['durata'];
							$giocate -> destinatari = $r['destinatari'];
							$giocate -> tipologia = $r['tipologia'];
							$giocate -> modalita = $r['modalita'];
							$giocate -> premi = $r['premi'];
							$giocate -> centro = $r['centro'];
							$giocate -> data = $r['data'];
					}
					
					return  $giocate;
			}
			
		public static function ControlloParametri($id)
      
        { 
        $sql = "select * from ".DB_NAME.".".PARAMETER." Where id = '$id'";
	    $giocate = new Action();
		$rows1 = mysql::querySelect($sql);
		foreach ($rows1 as $r) {
		                
                        $giocate -> provvisoria = $r['provvisoria'];
						$giocate -> returnUrl = $r['returnUrl'];
						$giocate -> ipAddress = $r['ipAddress'];
						
                }
                
                return  $giocate;
        }
		
		public static function getUnicoRaccolta($barcode)
      
        { 
        $sql = "select barcode from ".DB_NAME.".".RACCOLTA." where barcode = '$barcode' AND date(data)=curdate()";
	    $result=mysql_query($sql) or die (mysql_error());
        $rdb_conta=mysql_num_rows($result);
        return $rdb_conta;
        }
        
		public static function contaVinciteScontrino($id)
        
        { 
        	if ($id) {
        	$sql = "select SUM(importo_mappa) as tot from ".DB_NAME.".".GIOCATA." a inner join ".DB_NAME.".".PV." b on a.esercizio = b.id where b.valminimo = '$id' and curdate()=date(data)";
        	}else{
        	$sql = "select SUM(importo_mappa) as tot from ".DB_NAME.".".GIOCATA." a inner join ".DB_NAME.".".PV." b on a.esercizio = b.id where b.valminimo != '1' and curdate()=date(data)";
        	}
        	$giocate = new Action();
			$rows1 = mysql::querySelect($sql);
			foreach ($rows1 as $r) {
		                $giocate -> tot = $r['tot'];
                }
                
            return  $giocate;
        }
        
        public static function  getUnicoBarcode($barcode)
        {
        	$sql = "select barcode from ".DB_NAME.".".GIOCATA." where barcode = '$barcode' AND date(data)=curdate()";
        	$result=mysql_query($sql) or die (mysql_error());
        	$rdb_conta=mysql_num_rows($result);
        	return $rdb_conta;
        }
        
        public static function ingressiTempo ($data, $data1=null,$settore=null) {
        
        	$sql1 = "select sum(persone) as giocate from ".DB_NAME.".".ACCESSO." where";
        	if ($data1) $sql1 .= " data between '$data' and '$data1'"; else $sql1 .= " date('$data')=date(data)";
        	$sql1 .= " and barcode !='' and settore = '$settore'";
        	$giocate = new action();
        	$rows = mysql::querySelect($sql1);
        	foreach ($rows as $r) {
        	$giocate -> giocate = $r['giocate'];
        	}
        	return $giocate;	 
        }
		
        function randomPassword() {
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 10; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
        	return implode($pass); //turn the array into a string
        }
        
        public static function  controlloPassword($password)
        {
        	$sql = "select password from ".DB_NAME.".".FOTO." where user = '$password'";
        	$result=mysql_query($sql) or die (mysql_error());
        	$rdb_conta=mysql_num_rows($result);
        	return $rdb_conta;
        }
        
        public static function  controlloFoto($foto)
        {
        $sql = "select password from ".DB_NAME.".".FOTO." where foto = '$foto'";
        $result=mysql_query($sql) or die (mysql_error());
        $rdb_conta=mysql_num_rows($result);
        return $rdb_conta;
        }
        
        public static function  stessoscontrinogiocate($barcode, $valore,$esercizio,$numero)
        {
        	$sql = "select barcode from ".DB_NAME.".".SCONTRINO." where esercizio = '$esercizio' and  importo = '$valore' and numero_scontrino = '$numero'";
        	$result=mysql_query($sql) or die (mysql_error());
        	$rdb_conta=mysql_num_rows($result);
        	return $rdb_conta;
        }
        
        public static function getTempoRaccolta($barcode, $tempo)
        
        {
        	$sql = "select barcode from ".DB_NAME.".".RACCOLTA." where barcode = '$barcode' AND date(data)=curdate() AND data > now() - INTERVAL ".$tempo." MINUTE";
        	$result=mysql_query($sql) or die (mysql_error());
        	$rdb_conta=mysql_num_rows($result);
        	return $rdb_conta;
        }
        
        public static function tesserecomplessive ($val, $val1 = null) {
        
        	$sql1 = "select count(id) as giocate from ".DB_NAME.".".ACCREDITAMENTO." where ";
        	if ($val1) $sql1 .=" eliminata in ('$val', '$val1')"; else $sql1 .=" eliminata = '$val'";
        	$giocate = new Action();
        	$rows = mysql::querySelect($sql1);
        	foreach ($rows as $r) {
        		$giocate -> estrazione = $r['giocate'];
        	}
        	return $giocate;
        
        	 
        }
        
        public static function AccessiComplessive ($settore) {
        
        	$sql1 = "SELECT count( id ) AS id FROM ".DB_NAME.".".ACCESSO." where settore = '$settore'";
        	$giocate = new Action();
        	$rows = mysql::querySelect($sql1);
        	foreach ($rows as $r) {
        		$giocate -> id = $r['id'];
        	}
        	return $giocate;
        
        }
        
         
        public static function tesserebaby () {
        
        	$sql1 = "select count(id) as giocate from ".DB_NAME.".".ACCREDITAMENTO." where eliminata in ('N', 'M') AND operatore in (2, 3)";
        	$giocate = new Action();
        	$rows = mysql::querySelect($sql1);
        	foreach ($rows as $r) {
        		$giocate -> estrazione = $r['giocate'];
        	}
        	return $giocate;
        
        	 
        }
        
}
?>
