<?php



class SecurityManager {

    public static function login($username, $password, $application) {
		$answer = false;
		$sql = "select * FROM " . DB_NAME . "." . ADMIN . " where username = '$username'";
	
		$rows = mysql::querySelect($sql);
		if (count($rows) == 0) {
			return false;
		}
		
		$user = false;
		if($rows && count($rows)==1) {
			$pass_on_db = $rows[0]['password'];
			if ($pass_on_db == $password)
				$user = User::getUser($username, $application);
		}
		
		if($user)
			SessionManager::store($application, 'user', $user);
		
		return $user;
    }

    public static function logout($application) {
		SessionManager::destroyApplicationSession($application);
    }

    public static function isAuthenticated($user, $application) {
		$answer = false;
		if (SessionManager::retrieve($application, "user") != NULL) {
			$answer = true;
		}
		return $answer;
    }

	
    public static function isAuthorized($user, $application) {
		
		$valid = false;
		if($user && $application)
			$valid = $user->application == $application;
		return $valid;
    }
	
    public static function getLoggedInUser($application) {
		return SessionManager::retrieve($application, "user");
    }

}

?>
