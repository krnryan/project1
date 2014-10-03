<?php
	$db_link = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	if (!$db_link) {
		die("Could not connect to the database: ".mysql_error());
	}
	
	$db_selected = mysql_select_db(DB_NAME, $db_link);
	if (!$db_selected) {
		die ("Cannot use database: ".mysql_error());
	}
?>