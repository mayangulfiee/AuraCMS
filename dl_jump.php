<?php

/**
*	AuraCMS v.3.0
* 	Oktober 1, 2013 05:12:10 AM 
*	Iwan Susyanto, S.Si - admin@auracms.org      - 081 327 575 145
*/

	define('dl', true);
	if (isset($_GET['seftitle'])){
		
		include 'includes/conection.php';
		include 'includes/mysql.php';
		include 'includes/global.php';
		include 'includes/fungsi.php';
		$seftitle 	= seo(text_filter(cleanText($_GET['seftitle'])));
		$hasil		= $db->sql_query("SELECT * FROM `mod_download` WHERE `seftitle`='$seftitle'");
		$data		= $db->sql_fetchrow($hasil);
		$url		= $data['url'];
		$hits		= int_filter($data['hits']);
		$hits		= $hits+1 ;		

		$db->sql_query("UPDATE `mod_download` SET `hits`='$hits' WHERE `seftitle` = '$seftitle'");
		header ("location: $url");
		exit;
		
	}

?>