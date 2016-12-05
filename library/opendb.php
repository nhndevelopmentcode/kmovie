<?php
	$conn = mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) or die ( 'Error connecting to database.' );
		mysql_select_db (DB_NAME);
		mysql_query("SET character_set_results = 'utf8'", $conn);
?>