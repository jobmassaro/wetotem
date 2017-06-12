<?php
$cfg['player_host'] = "10.0.0.2";
$cfg['player_port'] = "8080";
$cfg['player_pass'] = "sasa";

function vlc($command, $win) 
{
    global $cfg;
  
  /*  $request  = 'GET /requests/playlist.xml?command=pl_play&id=6'. ' HTTP/1.1' . "\r\n";
    $request .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
    $request .= 'Connection: Close' . "\r\n";
    $request .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";


  $request2  = 'GET /requests/status.xml?command=pl_loop'.' HTTP/1.1' . "\r\n";
    $request2 .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
    $request2 .= 'Connection: Close' . "\r\n";
    $request2 .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";
*/

    


    
    
 
   


    //@fwrite($soket, $request) or die();
    if($win == 1 )
    {
		$request2  = 'GET /requests/status.xml?command=pl_play&id=9'.' HTTP/1.1' . "\r\n";
    $request2 .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
    $request2 .= 'Connection: Close' . "\r\n";
    $request2 .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";




		 $soket2 = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();
        @fwrite($soket2, $request2) or die();
		  //$content2 = stream_get_contents($soket2);
		 fclose($soket2);
       
        
    }else if($win == 0)
    {

     /*   @fwrite($soket3, $request3) or die();
        sleep(10);
        @fwrite($soket2, $request2) or die();
		 fclose($soket3);
    */
    }
    
    if($win ==10)
	{

		
 	   $request3  = 'GET /requests/status.xml?command=pl_play&id=8'.' HTTP/1.1' . "\r\n";
    	$request3 .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
    	$request3 .= 'Connection: Close' . "\r\n";
    	$request3 .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";

    
     $soket3 = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();


		 @fwrite($soket3, $request3) or die();
		   //$content3 = stream_get_contents($soket3);
		    fclose($soket3);
	}

    


    //content = stream_get_contents($soket);
  
  
    
     //$soket = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();

    //$content = stream_get_contents($soket);
    
      
    
    
    
    //fclose($soket);
   
    //fclose($soket3);
	
    $temp = explode("\r\n\r\n", $content, 2);
    if (isset($temp[1])) 
	{
        $header = $temp[0];
        $content = $temp[1];
    }
    
    return $content;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>IGIGLI-TOTEM</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <style>
    #mydiv
    {
      
    }
    </style>
    <body >
    <?php

    include('../inc/mysql.inc.php');
	
    $today 	= date('Y-m-d');
	$ora	= date('H:i:s');

    
   
	if ($result = $dbc->query("SELECT * FROM ".newgiornata." WHERE `data` = DATE('$today') AND TIME('$ora') > `inizio` AND TIME('$ora') < `fine` LIMIT 1")) 
    {
		
        if ($obj 	= $result->fetch_object())
		{
		
			$inizio		=	$obj->inizio; 
			$fine		=	$obj->fine; 
		
		}
	else
		
			$view = 'END';
			

	
    }
if ($view != 'END'){
    echo '<pre>'. vlc("pl_loop",10) .'</pre>';
    ?>
        <div id="mydiv" style="padding-top:-240px">
            <input type="text" id="mytext">
        </div>
        <button id="startTimeout" style="border:1px solid #fff;margin-top:-40px; margin-left:-15px;">
            <video id="video" controls autoplay loop width="100%" height="1080">     
                    <source src="http://10.0.0.2/concorso/media/loop.mp4" type="video/mp4" />
                    
            </video>
            
        </button>
    
<?php } else{ ?>

    	<body>
				<img src='dist/videos/end.jpg' width='100%'>
                <script> 
				    setTimeout(function () {
   					window.location.href = 'index.php';
					}, 5000) </script>
			";
            </script>
			</body>

<?php } ?>
  </body> 


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
var btn = document.getElementById("startTimeout");
document.getElementById('mytext').focus();

btn.onclick = function()
{
    
    var mydiv = document.getElementById("mydiv");
    var mytext = document.getElementById("mytext").value;
    var myvideo = document.getElementById("video");

    console.log(mytext);

    if(mytext==='undefined' || mytext=='')
       location.reload();

    console.log(mytext);

    setTimeout(function()
    {
       // location.href ='<a href="views/index.php">33</a>';
        location.href ='views/home.php?cliente='+mytext;
        //myvideo.innerHTML = 
    }, 1000);
    
}

 
 

</script>


    </body>
</html>