<?php

use Models\User;


session_start();


include('../inc/mysql.inc.php');


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $sql = "INSERT INTO ".DB_NAME.".".TESSERE_CANCELLATE." SELECT * FROM ".DB_NAME.".".ACCREDITAMENTO." WHERE id = {$_POST['id']} AND barcode='{$_POST['barcode']}'";
   $query = mysqli_query($dbc, $sql);
   if($query)
   {
      $delete = "DELETE FROM  ".DB_NAME.".".ACCREDITAMENTO." WHERE ID ={$_POST['id']}";
      $result = mysqli_query($dbc, $delete);
        if($result)
        {
             echo '<script>swal({
                    title: "Cancellato!",
                    text: "Attendi qualche secondo per completare la procedura.",
                    timer: 3000,
                    showConfirmButton: false
                    });</script>';
               header("refresh: 1;");
        }
   }

}
