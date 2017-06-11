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