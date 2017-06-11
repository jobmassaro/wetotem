<?php


class gioca {

    
	public function __construct() {
	
    }
	
	public static function gioca($tipo) {
        $inizio = 1;
	    $probabilita = null;
		$n = null;
        $ora = date("H:i:s");		
        
		$sql4 = "select * from ".DB_NAME.".".PROBABILITA." where tipo = '$tipo' and ('$ora' >= ora_inizio and '$ora' <= ora_fine)";
        $result4=mysql_query($sql4) or die (mysql_error());
        while ($rdb_conta4=mysql_fetch_array($result4)) 
        { 
         if (date('H:i:s') > $rdb_conta4['ora_inizio'] && date('H:i:s') < $rdb_conta4['ora_fine']) { $probabilita = $rdb_conta4['prob']; }
        }
		
		$n = rand($inizio, $probabilita);
		return $n;
	}

public static function gioca_online($tipo) {
        $inizio = 1;
	    $probabilita = null;
		$n = null;		
		$ora = date("H:i:s");
         
        $sql4 = "select * from ".DB_NAME.".".PROBABILITA_ONLINE." where tipo = '$tipo' and ('$ora' >= ora_inizio and '$ora' <= ora_fine)";
        $result4=mysql_query($sql4) or die (mysql_error());
        while ($rdb_conta4=mysql_fetch_array($result4)) 
        { 
        
        if (date('H:i:s') > $rdb_conta4['ora_inizio'] && date('H:i:s') < $rdb_conta4['ora_fine']) { $probabilita = $rdb_conta4['prob']; }
        }
		
   $n = rand($inizio, $probabilita);
	return $n;
}

public static function gioca_controlloPremi() {
        $sql1 = "select count(esito) as esito, data from ".DB_NAME.".".GIOCATA." where esito = 'VINCE' and date(data)=curdate()  ";
        $result1=mysql_query($sql1) or die (mysql_error());
        $rdb_conta=mysql_fetch_array($result1); 
		$esito = $rdb_conta['esito'];
		
		return $esito;

}
public static function gioca_tempiPremi($tipo) {
        $ora = date("H:i:s");		
        
		$sql4 = "select * from ".DB_NAME.".".PROBABILITA." where tipo = '$tipo' and ('$ora' >= ora_inizio and '$ora' <= ora_fine)";
        $result4=mysql_query($sql4) or die (mysql_error());
        $rdb_conta4=mysql_fetch_array($result4); 
		if ($rdb_conta4['intervallo']) {
        $sql3 = "select count(barcode) as barco from ".DB_NAME.".".GIOCATA." where esito = 'VINCE' and date(data)=curdate() and data > now() - INTERVAL ".$rdb_conta4['intervallo']." MINUTE";
        $result3=mysql_query($sql3) or die (mysql_error());
        $rdb_conta3=mysql_fetch_array($result3); 
        $esito = $rdb_conta3['barco'];
		}
		return $esito;

}

public static function gioca_controlloPremi_online() {
        
		$sql1 = "select count(esito) as esito, data from ".DB_NAME.".".GIOCATA_ONLINE." where esito = 'VINCE' and date(data)=curdate()  ";
        $result1=mysql_query($sql1) or die (mysql_error());
        $rdb_conta=mysql_fetch_array($result1); 
		$esito = $rdb_conta['esito'];
		
		return $esito;

}
public static function gioca_tempiPremi_online($tipo) {
		$ora = date("H:i:s");		
        
		$sql4 = "select * from ".DB_NAME.".".PROBABILITA_ONLINE." where tipo = '$tipo' and ('$ora' >= ora_inizio and '$ora' <= ora_fine)";
        $result4=mysql_query($sql4) or die (mysql_error());
        $rdb_conta4=mysql_fetch_array($result4); 
		if ($rdb_conta4['intervallo']) {
        $sql3 = "select count(barcode) as barco from ".DB_NAME.".".GIOCATA_ONLINE." where esito = 'VINCE' and date(data)=curdate() and data > now() - INTERVAL ".$rdb_conta4['intervallo']." MINUTE";
        $result3=mysql_query($sql3) or die (mysql_error());
        $rdb_conta3=mysql_fetch_array($result3); 
        $esito = $rdb_conta3['barco'];
		}
		return $esito;

}
public static function gioca_contaFasce($tipo) {
        $sql4 = "select count(id) as id from ".DB_NAME.".".PROBABILITA." where tipo = '$tipo'";
        $result4=mysql_query($sql4) or die (mysql_error());
        $rdb_conta4=mysql_fetch_array($result4); 
		
        $esito = $rdb_conta4['id'];
		
		return $esito;

}

public static function gioca_contaFasce_online($tipo) {
        $sql4 = "select count(id) as id from ".DB_NAME.".".PROBABILITA_ONLINE." where tipo = '$tipo'";
        $result4=mysql_query($sql4) or die (mysql_error());
        $rdb_conta4=mysql_fetch_array($result4); 
		
        $esito = $rdb_conta4['id'];
		
		return $esito;

}
public static function gioca_uscitePremi($tipo) {
        $ora = date("H:i:s");		
        
		$sql4 = "select premi from ".DB_NAME.".".PROBABILITA." where tipo = '$tipo' and ('$ora' >= ora_inizio and '$ora' <= ora_fine)";
        $result4=mysql_query($sql4) or die (mysql_error());
        $rdb_conta4=mysql_fetch_array($result4); 
		 
        $esito = $rdb_conta4['premi'];
		
		return $esito;

}

public static function gioca_uscitePremi_online($tipo) {
        $ora = date("H:i:s");		
        
		$sql4 = "select premi from ".DB_NAME.".".PROBABILITA_ONLINE." where tipo = '$tipo' and ('$ora' >= ora_inizio and '$ora' <= ora_fine)";
        $result4=mysql_query($sql4) or die (mysql_error());
        $rdb_conta4=mysql_fetch_array($result4); 
		 
        $esito = $rdb_conta4['premi'];
		
		return $esito;

}


}
?>
