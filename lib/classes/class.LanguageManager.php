<?php



class LanguageManager {

    public static function setCurrentLanguage($application) {
	if (isSet($_GET['lang'])) {
	    SessionManager::store($application, "lang", $_GET['lang']);
	} else if(SessionManager::retrieve($application, "lang")!=""){ 
	    ;
	}else{
	    SessionManager::store($application, "lang", "it");
	}
    }

    public static function getCurrentLanguage($application) {
	return SessionManager::retrieve($application, "lang");
    }

    public static function getString($application,$key) {
	$isocode = LanguageManager::getCurrentLanguage($application);
	include PATH_GLOBAL . "conf/messages_$isocode.php";
	return $language[$key];
    }
	
	public static function getArray($application,$key) {
		return LanguageManager::getString($application,$key);
    }

    public static function getStringFirstLetterUppercase($application,$key) {
	return ucfirst(LanguageManager::getString($application,$key));
    }
    
    public static function getStringAllUppercase($application,$key) {
	return strtoupper(LanguageManager::getString($application,$key));
    }

}

?>