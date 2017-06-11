<?php 

session_start();
use Models\Action;


include('../inc/mysql.inc.php');
include("../lib/classes/class.javascript_tessere.php");


$cognome = $_GET['cognome'];
$barcode = $_GET['barcode'];




if($cognome!="") {
			$where.=" and cognome like '%".str_replace("'","&#039;",$cognome)."%' ";
			}
if($barcode!="") {
			$where.=" and barcode  = '$barcode'";
			}
	$where.=" and eliminata in ('N', 'M', 'F', 'B', 'P')";
//Rimuovere il primo 'and' dalla clausola where
if($where!="") $where=substr($where,5);


        //-----------------------------------------------------------------------PRENDI DATI DA DB E STAMPA
        

        
        $query1="SELECT id, barcode as Barcode, 
		nome as Nome, 
		cognome as Cognome, 
		mobile as Mobile, 
		email as Mail,
        		eliminata
                    FROM 
                    ".DB_NAME.".".ACCREDITAMENTO."";
        
                         if ($where) $query1 .= " WHERE ".$where." ";
                         
          $result=mysqli_query($dbc,$query1);

         
        
        while ($rdb=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            // ----- togli gli slash dal record
            
            foreach ($rdb as $name => $value)
            {
                     if (!is_numeric($name)AND($name != 'eliminata'))
                     {
                        $rdb["$name"] = trim($rdb["$name"]);  
                        $rdb["$name"] = stripslashes($rdb["$name"]);
                     };
            };
            
            
            
                 // ----- stampa intestazioni tabella
                
            if (!$i)
            {
                $i=0;
                ?>
<div></div><br><br>
<?php
  //  echo $rdb['eliminata']; 
?>

<?php if ($rdb['eliminata'] == 'F') { ?>
<input type="button" id="bottoneTessere_figli" name="bottoneTessere_figli" value="Sostituzione/Modifica Card">
<?php }
if ($rdb['eliminata'] == 'B') { ?>
<input type="button" id="bottoneTessere_bamb" name="bottoneTessere_bamb" value="Sostituzione/Modifica Card">
<?php } 
if ($rdb['eliminata'] == 'P') { ?>
<input type="button" id="bottoneTessere_prov" name="bottoneTessere_prov" value="Sostituzione/Modifica Card">
<?php }
if (($rdb['eliminata'] == 'M') OR ($rdb['eliminata'] == 'N')) {  ?>
<input type="button" id="bottoneTessere" name="bottoneTessere" value="Sostituzione/Modifica Card"> 
<?php } ?><input type="button" id="bottone1Tessere" name="bottone1Tessere" value="Elimina Card" >
<br><br><div id="tableSostituzioneCard"><br>
                <table width="80%" cellpadding="5" border="1" bordercolor="#E0E0E0">
                <tr align="left">
                <?php
                    foreach ($rdb as $name => $value)
                    {					
                        if (!is_numeric($name)AND($name != 'eliminata'))
                     {
                         ?> 
                                <td style="font-weight:bold; font-family:Tahoma"><?=$name?>
                               
                                </td>  
                            <?php
                      }; 
                    }; 
                ?>
 
                </tr>
            <?php
            };
            
            // ----- stampa righe tabella 
             
            ?>
            
                <tr valign="middle" align="left" <?php if ($i%2 == false) { ?> bgcolor="#fcffc7" <?php } else { ?> bgcolor="#fefff3" <?php }; ?>>    
                <td style="text-transform:uppercase"><?=$rdb['id']?></td>
                <td style="text-transform:uppercase"><?=$rdb['Barcode']?></td>
                <td style="text-transform:uppercase"><?=$rdb['Nome']?></td> 
                <td style="text-transform:uppercase"><?=$rdb['Cognome']?></td>
                <td style="text-transform:uppercase"><?=$rdb['Mobile']?></td>
                <td style="text-transform:uppercase"><?=$rdb['Mail']?></td>
              
                
                <td style="text-transform:uppercase">
                <input type="hidden" name="id" value="<?=$rdb['id']?>"> 
                <input type="radio" name="barcodetabella" id="barcodetabella" value="<?=$rdb['Barcode']?>" /></td></tr>
                
                
         <?php
            $i++;
        };
        
       
        
        ?> </table> 

</div>