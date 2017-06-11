<?php


class ConfigurationManager {

    public static function getApplicationConfig($key) {
		$answer = NULL;
		$sql = "select config_value FROM ".DB_NAME.".T_CONFIGURATIONS where config_key = '$key'";
		
		//echo $sql;
		$rows = mysql::querySelect($sql);
		if (count($rows) == 0) {
			return $answer;
		}
		foreach ($rows as $r) {
			$answer = $r['config_value'];
		}
		return $answer;
    }
	
	public static function setApplicationConfig($key, $value) {
		
		$sql = "update ".DB_NAME.".T_CONFIGURATIONS 
				SET config_value = '".$value."'
				where config_key = '".$key."'";
		
		return mysql::queryNonSelect($sql);
    }
}

?>