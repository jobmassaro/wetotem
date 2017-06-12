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