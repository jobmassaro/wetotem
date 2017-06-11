<?php

	function html_encode($str){
		if($str){
			$str = htmlentities($str);
			$str = str_replace(' ','&nbsp;',$str);
		}
		return $str;
	}
	
	function format_euro($n, $with_label=false){
		$n = $n/100;
		$ret = number_format($n, 2, ',', '.');
		if($with_label)
			$ret = '&euro; ' .$ret;
		return $ret;
	}

	
	function format_ts($ts, $with_time = false){
		$conv = 'd/m/Y';
		if($with_time)
			$conv .= ' H:i:s';
		return date($conv, $ts);
	}
	
	function format_day($day){
		//$array = array('Domenica','Lunedi','Martedi','Mercoledi','Giovedi','Venerdi','Sabato');
		$array = LanguageManager::getArray("gestall","giorni_settimana");
		return $array[$day];
	}
?>