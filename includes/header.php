<!DOCTYPE html>
<html ondragstart='return false;' onselectstart='return false;' oncontextmenu='return false;'>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>
  
  <?php 
 
  
	if (isset($page_title)) 
    { 
	    echo $page_title; 
	} else 
    { 
			echo 'TT - ?'; 
	} 
  
  $application = "/gtotem";
         
	?>


 </title>
  <link href="<?php echo $application; ?>/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<style>
		body{margin:0;cursor:none;overflow:hidden;}
		form
		{
			position:absolute;
			top:-50px;
		}
		.label
		{
			letter-spacing: 3px;
			color: #0089D0; //#c78825;
			background-color: #fed165;
			text-shadow: 
				2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 
				1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;
			padding: 10px;
			font-size:3vw; 
			border: 5px solid white;
		}
		#totemCrediti
		{
			position:absolute; 
			right:30px; 
		}
		#totemUser
		{
			position:absolute; 
			left:30px; 
		}
		#totemPremi
		{
			width:100%;
			text-align:center;	
			position:absolute; 
			bottom:0;
		}
	</style>
</head>
<script>function refresh(){window.location = window.location.href.split("?")[0];} </script>