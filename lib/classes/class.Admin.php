<?php

ob_start();

class admin

{
	
/* GESTIONE ADMIN UTENTI */
	
	
	function editAction_utente($adminid)
	{
			// Define post fields into simple variables
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$password = $_POST['password'];
	$username = $_POST['username'];
       
	
	
	/* Lets strip some slashes in case the user entered
	any escaped characters. */
	
	$first_name = stripslashes($first_name);
	$last_name = stripslashes($last_name);
	$username = stripslashes($username);
	$db_password = stripslashes($password);
	
	if ($password == "") {
	// Enter info into the Database.
	$info2 = htmlspecialchars($info);
	$sql = mysql_query("UPDATE ".DB_NAME.".".ADMIN." SET first_name = '$first_name', last_name = '$last_name', username = '$username', signup_date = now(), activated = '".$_POST['activated']."' WHERE adminid = $adminid ") or die (mysql_error());
	} else {
		$info2 = htmlspecialchars($info);
	$sql = mysql_query("UPDATE ".DB_NAME.".".ADMIN." SET first_name = '$first_name', last_name = '$last_name', username = '$username', password = '$db_password', signup_date = now(), activated = '".$_POST['activated']."' WHERE adminid = $adminid ") or die (mysql_error());
		 } ?>
	
	 <script>
	   alert("MODIFICA AVVENUTA CON SUCCESSO")
	   </script>
       <?php
	   include("models/join_form.php"); 
	
		
	}
	function queryAction_utenti()
	{
	
	$query = "SELECT * FROM ".DB_NAME.".".ADMIN." WHERE user_level != 'super' ORDER BY adminid ASC";
	$result = mysql_query($query) or die (mysql_error());
	$user = $_SESSION["user"];
	echo "<table class=\"table table-bordered table-striped\" >
    <thead>
    <th>Nome</th>
	<th>Cognome</th>
	<th>Username</th>
	<th>Password</th>
        <th>Id</th>
    </thead><tbody>";
	while ($rows = mysql_fetch_array($result)) {
		$last_name = $rows[last_name];
		$first_name = $rows[first_name];
		$username = $rows[username];
		$password = $rows[password];
        $adminid = $rows[adminid];
        
		echo "<tr>
    <tr><td >" . $first_name . "</td>
	<td >" . $last_name . "</td>
	<td >" . $username . "</td>
<td >" . $password . "</td>
    <td >" . $adminid . "</td>
    </tr >";
	}
	echo "</tbody></table>";
	}
        
	function query1Action_utente($adminid)
	{
	
	$query = "SELECT * FROM ".DB_NAME.".".ADMIN." WHERE password = '".$_GET['password']."'";
	$result = mysql_query($query) or die (mysql_error());
	$rows = mysql_fetch_array($result);
	$user = $_SESSION["user"];
	include("models/join_form.php");
	
	}	
	function deleteutente()
	{
		$query = "DELETE FROM ".DB_NAME.".".ADMIN." WHERE password = '".$_GET['password']."'";
		$result = mysql_query($query) or die (mysql_error());
		 echo "<br><br><br>";
		echo "Utente cancelato correttamente!&nbsp;&nbsp;<a href=\"home.php\">" . "TORNA ALL'HOMEPAGE" . "</a>";
		echo "<br><br><br>";
	}

function register_password()
	{
			
			
	// Define post fields into simple variables
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$random_password = $_POST['password'];
	$username = $_POST['username'];
	$activate = $_POST['activated'];
	$level = $_POST['level'];
	
	/* Lets strip some slashes in case the user entered
	any escaped characters. */
	
	$first_name = stripslashes($first_name);
	$last_name = stripslashes($last_name);
	$username = stripslashes($username);
	
	
	
	/* Do some error checking on the form posted fields */
	
	if((!$first_name) || (!$last_name) || (!$username)){
		echo 'You did not submit the following required information! <br />';
		if(!$first_name){
			echo "First Name is a required field. Please enter it below.<br />";
		}
		if(!$last_name){
			echo "Last Name is a required field. Please enter it below.<br />";
		}
		if(!$username){
			echo "Desired Username is a required field. Please enter it below.<br />";
		}
		include 'join_form.php'; // Show the form again!
		/* End the error checking and if everything is ok, we'll move on to
		 creating the user account */
		exit(); // if the error checking has failed, we'll exit the script!
	}
	
	/* Let's do some checking and ensure that the user's email address or username
	 does not exist in the database */
	
	 $sql_username_check = mysql_query("SELECT username FROM ".DB_NAME.".".ADMIN." WHERE username='$username'");
	 $username_check = mysql_num_rows($sql_username_check);
	
	 if(($username_check > 0)){
		echo "Correggi questi errori: <br />";
		if($username_check > 0){
			echo "Username gi&agrave; presente nel database<br />";
			unset($username);
		}
		include 'models/join_form.php'; // Show the form again!
		exit();  // exit the script so that we do not create this account!
	 }
	
	/* Everything has passed both error checks that we have done.
	It's time to create the account! */
	
	/* Random Password generator.
	http://www.phpfreaks.com/quickcode/Random_Password_Generator/56.php
	
	We'll generate a random password for the
	user and encrypt it, email it and then enter it into the db.
	*/
	
	
	$db_password = $random_password;
	
	// Enter info into the Database.
	$info2 = htmlspecialchars($info);
	$sql = mysql_query("INSERT INTO ".DB_NAME.".".ADMIN." (first_name, last_name, username, password, user_level, signup_date, activated)
			VALUES('$first_name', '$last_name', '$username', '$db_password',  '$level', now(), '$activate')") or die (mysql_error());
			
	$sql3 = "select count(id) from ".DB_NAME.".".TABS." where user_level='concorso'";
	$result2 = mysql_query($sql3) or die (mysql_error());
	$rd=mysql_fetch_array($result2);
	if ($rd['id']) {
	$sq2 = mysql_query("INSERT INTO ".DB_NAME.".".TABS." (`user_level`, `vendita_buoni`, `elenco_buoni`, `scontrini`, `scontrini_multi`, `nuova_tessera`, `elenco_tessere`, `vincite`, `vincite_online`, `casellario`, `report`, `report_buoni`, `report_ingressi`, `baby`, `ingressi`, `foto`, `fotoricerca`, `timer`, `vita_carta`, `estrazioni`, `configurazioni`) VALUES  ('concorso', '', '', '1', '', '1', '1', '', '', '', '1', '', '', '', '', '', '', '', '')") or die (mysql_error());
	}
	if(!$sql){
		echo 'There has been an error creating your account. Please contact the webmaster.';
	} else {
		$userid = mysql_insert_id();
		$activatepath = "activate.php?id=$adminid&code=$db_password";
		} ?>
	 <script>
	   alert("UTENTE AGGIUNTO CON SUCCESSO")
	   </script>
       <?php
       $param = 1;
	   include("models/join_form.php"); 
	
		
	}
}
?>