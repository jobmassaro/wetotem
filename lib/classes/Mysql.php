<?php

namespace  Models;


class Mysql {

    //TODO - Implementare metodi per gestire transazioni


    static public function queryNonSelectTrans($sqls) {
	
    }

    static public function queryNonSelect($sql) {
		
		global $db;
		mysql_select_db(DB_NAME_APP);
		$rows = mysql_query($sql, $db);
		if (!$rows) {
			echo ("\r\n \r\n MYSQL : " . mysql_error() . " \r\n RIFERIMENTO :: \r\n $sql \r\n \r\n ");
			die();
		};
		return $rows;
    }

    static public function querySelect($sql,$array_type=MYSQL_BOTH)
	 {
	global $db;
	$rows = mysql::queryNonSelect($sql, $db);
	$array;
	while ($row = mysql_fetch_array($rows,$array_type)) {
	    $array[] = $row;
	}
	$num = mysql_numrows($rows); //verifico quante righe restituisce l'array se non � 0 restituisco array.
	
	if (!$num)
	    $array = array();

	return $array;
    }

    static public function decodeGet() {
	foreach ($_GET as $name => $value) {
	    $_GET["$name"] = urldecode($value);
	    $_GET["$name"] = stripslashes($value);
	}
    }

}