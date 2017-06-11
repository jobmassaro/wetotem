<?php



session_start();

include('../inc/mysql.inc.php');

$data = json_decode(file_get_contents("php://input")); 

$barcode = mysqli_real_escape_string($dbc, $data->barcode);
$nome = mysqli_real_escape_string($dbc, $data->nome);
$cognome = mysqli_real_escape_string($dbc, $data->cognome);
$indirizzo = mysqli_real_escape_string($dbc, $data->indirizzo);
$civico = mysqli_real_escape_string($dbc, $data->civico);
$comune = mysqli_real_escape_string($dbc, $data->comune);
$cap = mysqli_real_escape_string($dbc, $data->cap);
$prv = mysqli_real_escape_string($dbc, $data->prv);
$nascita = mysqli_real_escape_string($dbc, $data->nascita);
$sesso = mysqli_real_escape_string($dbc, $data->sesso);
$telefono = mysqli_real_escape_string($dbc, $data->telefono);
$mobile = mysqli_real_escape_string($dbc, $data->mobile);
$email = mysqli_real_escape_string($dbc, $data->email);
$privacy = mysqli_real_escape_string($dbc, $data->privacy);
$privacy1 = mysqli_real_escape_string($dbc, $data->privacy1);

 
 /*                 
echo $nome .'<br />';
echo $cognome .'<br />';
echo $indirizzo .'<br />';
echo $civico .'<br />';
echo $comune .'<br />';
echo $cap .'<br />';
echo $prv .'<br />';
echo $nascita .'<br />';
echo $sesso .'<br />';
echo $telefono .'<br />';
echo $mobile .'<br />';
echo $email .'<br />';
echo $privacy .'<br />';
echo $privacy1 .'<br />';

*/




$sql ="INSERT INTO ".DB_NAME.".".ACCREDITAMENTO. " (barcode, nome,cognome,nascita,indirizzo,civico,cap,comune,provincia,email,telefono,mobile,privacy,privacy2,sesso,operatore) 
    VALUES('{$barcode}','{$nome}','{$cognome}','{$nascita}','{$indirizzo}','{$civico}','{$cap}','{$comune}', '{$prv}','{$email}','{$telefono}','{$mobile}',{$privacy},{$privacy1},'{$sesso}','{$_SESSION['user_id']}' )";
$query = mysqli_query($dbc, $sql);


if($query)
{
    echo json_encode(true);	
}
else
{
    echo json_encode(false);	
}


                    
                        