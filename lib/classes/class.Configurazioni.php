<?php

class config {

      function update_conf()
	{
        $valore = $_POST['valore'];
        
        switch (true){
            
            case ($valore == "CONCORSO" ):
            $query1="UPDATE ".DB_NAME.".".CONCORSO." SET ";
            break;
            
            case ($valore == "GIORNATA" ):
			$query1="UPDATE ".DB_NAME.".".GIORNATA." SET "; 
            break;
           
            case ($valore == "PROBABILITA" ):
            $query1="UPDATE  ".DB_NAME.".".PROBABILITA." SET ";
            break;
            
            case ($valore == "TABS" ):
            $query1="UPDATE  ".DB_NAME.".".TABS." SET "; 
            break;
            
            case ($valore == "GIORNATA_ONLINE" ):
            $query1="UPDATE  ".DB_NAME.".".GIORNATA_ONLINE." SET "; 
            break;
            
            case ($valore == "PROBABILITA_ONLINE" ):
            $query1="UPDATE  ".DB_NAME.".".PROBABILITA_ONLINE." SET "; 
            break;
			
			case ($valore == "QUERY" ):
            $query1="UPDATE  ".DB_NAME.".".QUERY." SET "; 
            break;
            
            }
            
 // ----- togli gli slash dal record
                            if ($_POST) {
                                  $kv = array();
                                  foreach ($_POST as $key => $value) {
                                    if (!is_numeric($key) AND $key != 'valore' AND $key != 'modifica100')  { 
                                  $kv[] = "$key";
                                  $temp[] = $value;
                                        }
                                  }
                                }
                          for ($i=0; $i<=count($kv)-1;$i++) {
                              if ($kv[$i] == 'id') 
                              { $where .= " WHERE $kv[$i] = '$temp[$i]'"; 
                              }else{
							  $sommatemp = str_replace("'","&#039;",$temp[$i]);
                              $sommaquery.= ", $kv[$i] = '$sommatemp'";
                              }
                              }
                    

if($sommaquery!="") $sommaquery=substr($sommaquery,2);
$query1 .= $sommaquery.$where;
$result1 = mysql_query($query1) or die (mysql_error());
 
            ?>
             <script>
	   alert("MODIFICA AVVENUTA CON SUCCESSO")
           window.location='./index.php';
	   </script>
       <?php
	}
            
        }
?>