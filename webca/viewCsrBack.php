<?php
include('session.php');
		
if($level_session == 'user'){
	// SQL query
	$query = mysql_query("select * from tblcertificate where owner = '$login_session'", $connection);
	if ($query) {
		$row = mysql_fetch_array($query);
	} else {
		$error = "Cannot";
		die('Invalid query: ' . mysql_error());
	}
	mysql_close($connection); // Closing Connection
}

	
	



?>