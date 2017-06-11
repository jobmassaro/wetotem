<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="description" content="" />

	<!-- custom stylesheet -->
	<link href="<?php echo LNK_CSS ?>style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo LNK_CSS ?>jquery.tablesorter.pager.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo LNK_CSS ?>custom-theme/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />

    <!-- jquery -->
	<script src="<?php echo LNK_SCRIPT ?>jquery-1.8.3.js"></script>
	<script src="<?php echo LNK_SCRIPT ?>jquery-ui-1.9.2.custom.js"></script>
    <script src="<?php echo LNK_SCRIPT ?>jquery-ui.multidatespicker.js"></script>

    <!-- plugins Tmpl e TableSorter -->
    <script src="<?php echo LNK_SCRIPT ?>jquery.tmpl.min.js"></script>
	<script src="<?php echo LNK_SCRIPT ?>jquery.tablesorter.min.js"></script>
    <script src="<?php echo LNK_SCRIPT ?>jquery.tablesorter.pager.js"></script>
	<script src="<?php echo LNK_SCRIPT ?>jquery.printPage.js" ></script>
	
	<!-- custom scripts -->
	<script src="<?php echo LNK_SCRIPT ?>esterno.js"></script>

    </head>
    <body >
	
	<div id="all">
	    <div id="header">
		<table width="100%">
		    <tr>
			<td align="right" width="50%"><img src="<?= LNK_IMAGES ?>logo.png" height="100%" /></td><td align="right" width="50%">
			    <?php
				
				if (SecurityManager::getLoggedInUser("uno") != NULL) {
                                    
                                    echo SecurityManager::getLoggedInUser("uno")->userid;
                                    $level_user = SecurityManager::getLoggedInUser("uno")->user_level;
									echo "<a href=\"index.php\"> - Home<a/>";
                                    if (($level_user == 'admin') || ($level_user == 'super')) { 
                                    echo "<a href=\"creautenti.php\"> - Crea Utenti<a/>"; }
                                    echo "<a href=\"logout.php\"> - logout<a/></td>";
			
				}
			  
			    ?></td>
		    </tr>
		</table>
	    </div>
