<?php
include('session.php');
		
if($level_session == 'user'){
	// SQL query
	$query = mysql_query("select * from tblcertificate where owner = '$login_session'", $connection);
	if (!$query) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($connection); // Closing Connection
}

if($level_session == 'admin'){
	// SQL query
	$query = mysql_query("select * from tblcertificate", $connection);
	if (!$query) {
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($connection); // Closing Connection
}


	
	



?>