<?php

class SessionManager {

    public static function store($application, $key, $value) {
	$_SESSION[$application][$key] = $value;
    }

    public static function retrieve($application, $key) {
	return $_SESSION[$application][$key];
    }

    public static function destroyApplicationSession($application) {
	return $_SESSION[$application] = NULL;
	session_destroy();
    }
    
    public static function toString($application){
	var_dump ($_SESSION[$application]);
    }

}

?>
