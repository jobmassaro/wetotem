<?php 
	session_start();
    use Models\Action;


    include('../inc/mysql.inc.php');

	$barcode = $_GET['barcode'];
	$numero = $_GET['numero'];

	$query1="select nome, cognome from ".DB_NAME.".".ACCREDITAMENTO." where barcode='$barcode'";
    $result=mysqli_query($dbc,$query1);
	$rdb=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$id_user = $_SESSION['user_id'];
	list($data, $ora) = explode(" ", date("Y-m-d H:i:s"));

	$query = "
		INSERT INTO ".DB_NAME.".".ACCESSO." 
		(
			barcode,
			data,
			operatore_nome,
			settore,
			orario_ingresso
		)
		VALUES 
		(
			'$barcode',
			'".date("Y-m-d H:i:s")."', 
			'$id_user',
			'BabyParking',
			'$numero'
		)
	";
	
    $ret =mysqli_query($dbc,$query);
	
?>
BARCODE 		<br><?=$barcode?><BR>
NOME 			<?=$rdb['nome']?><BR>
COGNOME 		<?=$rdb['cognome']?><BR>
DATA 			<?=$data?><BR>
ORA 			<?=$ora?><BR>
ACQUISTA NR. 	<?=$numero?> INGRESSI<br />