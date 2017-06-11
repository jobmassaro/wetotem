<?php

use Models\User;


session_start();


include('../inc/mysql.inc.php');



if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id =  mysqli_real_escape_string($dbc,$_POST['id']);
    $barcode =  mysqli_real_escape_string($dbc,$_POST['barcode']);
    $nome = mysqli_real_escape_string($dbc,$_POST['nome']);
    $cognome = mysqli_real_escape_string($dbc,$_POST['cognome']);
    $indirizzo = mysqli_real_escape_string($dbc,$_POST['indirizzo']);
    $sesso = mysqli_real_escape_string($dbc,$_POST['sesso']);
    $civico = mysqli_real_escape_string($dbc,$_POST['civico']);
    $comune = mysqli_real_escape_string($dbc,$_POST['comune']);
    $cap = mysqli_real_escape_string($dbc,$_POST['cap']);
    $provincia = mysqli_real_escape_string($dbc,$_POST['prv']);
    $nascita = mysqli_real_escape_string($dbc,$_POST['nascita']);
    $telefono = mysqli_real_escape_string($dbc,$_POST['telefono']);
    $mobile = mysqli_real_escape_string($dbc,$_POST['mobile']);
    $email = mysqli_real_escape_string($dbc,$_POST['email']);
    $privacy = mysqli_real_escape_string($dbc,$_POST['privacy']);
    $privacy1 = mysqli_real_escape_string($dbc,$_POST['privacy1']);


    $sql ="UPDATE  ".DB_NAME.".".ACCREDITAMENTO." 
        SET barcode = '{$barcode}',
        nome ='{$nome}', 
        cognome = '{$cognome}',
        indirizzo = '{$indirizzo}',
        civico = '{$civico}',
        comune = '{$comune}',
        cap = '{$cap}',
        provincia = '{$provincia}',
        nascita = '{$nascita}',
        telefono = '{$telefono}',
        mobile = '{$mobile}',
        email = '{$email}',
        privacy = '{$privacy}',
        privacy2 = '{$privacy1}' WHERE id = {$id}";


    $query = mysqli_query($dbc, $sql);
    if($query)
    {
        header('location: ../accounts/index.php');
    }
    



    
/*
    echo '<h1>'. $id .'</h1><br />';
    echo '<h1>'. $barcode .'</h1><br />';
    echo '<h1>'.  $nome .'</h1><br />';
    echo '<h1>'.  $cognome .'</h1><br />';
    echo '<h1>'. $indirizzo .'</h1><br />';
    echo '<h1>'.  $civico .'</h1><br />';
    echo '<h1>'.  $comune .'</h1><br />';
    echo '<h1>'.  $cap .'</h1><br />';
    echo '<h1>'.  $provincia .'</h1><br />';
    echo '<h1>'.  $nascita .'</h1><br />';
    echo '<h1>'.  $telefono .'</h1><br />';
    echo '<h1>'.  $mobile .'</h1><br />';
    echo '<h1>'.  $email .'</h1><br />';
    echo '<h1>'.  $privacy .'</h1><br />';
    echo '<h1>'.  $privacy1 .'</h1><br />';
*/
    



    


    

}