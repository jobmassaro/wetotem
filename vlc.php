<!DOCTYPE html>
<html>
    <head>
        <title>TEST</title>
    </head>
    <body>
    <?php 

    
// run this script while playing a song with vlc and the http interface enabled
// the original script is part of netjukebox (netjukebox.nl)

//vlc-client configuration
// XAMP 10.0.0.2
$cfg['player_host'] = "10.0.0.2";
$cfg['player_port'] = "8080";
$cfg['player_pass'] = "sasa";

//echo("<pre>" . vlc2("pl_loop") . "</pre>");
echo("<pre>" . vlc("pl_loop",1) . "</pre>");


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

    


    $request2  = 'GET /requests/status.xml?command=pl_previous'.' HTTP/1.1' . "\r\n";
    $request2 .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
    $request2 .= 'Connection: Close' . "\r\n";
    $request2 .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";
    
 

    $request3  = 'GET /requests/status.xml?command=pl_next'.' HTTP/1.1' . "\r\n";
    $request3 .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
    $request3 .= 'Connection: Close' . "\r\n";
    $request3 .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";

    
    $soket = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();
    $soket2 = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();
    $soket3 = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();

    //@fwrite($soket, $request) or die();
    if($win == 1 )
    {
        @fwrite($soket2, $request2) or die();
        sleep(10);
        @fwrite($soket3, $request3) or die();
    }else if($win == 0)
    {

        @fwrite($soket3, $request3) or die();
        sleep(10);
        @fwrite($soket2, $request2) or die();
    
    }
    
    

    


    //content = stream_get_contents($soket);
    $content2 = stream_get_contents($soket2);
    $content3 = stream_get_contents($soket3);
    
     //$soket = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();

    //$content = stream_get_contents($soket);
    
      
    
    
    
    //fclose($soket);
    fclose($soket2);
    fclose($soket3);
	
    $temp = explode("\r\n\r\n", $content, 2);
    if (isset($temp[1])) {
        $header = $temp[0];
        $content = $temp[1];
    }
    
    return $content;
}
function vlc2($command) 
{
    global $cfg;
    $request  = 'GET /requests/status.xml?command=pl_loop'.' HTTP/1.1' . "\r\n";
    $request .= 'Host: ' . $cfg['player_host'] . ':' . $cfg['player_port'] . "\r\n";
    $request .= 'Connection: Close' . "\r\n";
    $request .= 'Authorization: Basic ' . base64_encode(':' . $cfg['player_pass']) . "\r\n\r\n";
    
    $soket = @fsockopen($cfg['player_host'], $cfg['player_port'], $error_no, $error_string, 1) or die();
    @fwrite($soket, $request) or die();
    $content = stream_get_contents($soket);
    fclose($soket);
	
    $temp = explode("\r\n\r\n", $content, 2);
    if (isset($temp[1])) {
        $header = $temp[0];
        $content = $temp[1];
    }
    
    return $content;
}



   
  ?>
       
        <a href="http://192.168.111.173:8080/requests/playlist.xml?command=pl_play&id=6">LINK2</a>
    </body>
</html>