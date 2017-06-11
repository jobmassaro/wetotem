<?php



namespace Models;

class User {

    public $name;
    public $username;
    public $userid;
    public $group_name;
	public $level_name;
	public $level_value;
	public $application;
	public $all_groups;
	public $coach_ref_name;
	public $coach_ref_id;
	public $credits;
	
    public function __construct() {
		
    }

	
	public static function getUser($username, $application) {

		$user = false;
		
		$sql = "select * FROM " . DB_NAME . "." . ADMIN . " where username = '$username'";
		$rows = mysql::querySelect($sql);
		if($rows && count($rows)==1) {
			$user = new User();
			$r = $rows[0];
			
			$user->name = $r['first_name'];
			$user->surname = $r['last_name'];
			$user->userid = $r['adminid'];
            $user->user_level = $r['user_level'];
			$user->gift_level = $r['gift_level'];
			$user->application = $application;
		}
	
		return $user;
    }
	
	
}

?>
