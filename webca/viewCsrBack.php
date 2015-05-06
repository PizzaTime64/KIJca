<?php
include('session.php');
		
// SQL query
		$query = mysql_query("", $connection);
		if ($query) {
			$msg = "Certificate Signing Request was submitted";
		} else {
			$error = "Cannot submit Certificate Signing Request";
			echo 'taes';
			die('Invalid query: ' . mysql_error());
		}
		mysql_close($connection); // Closing Connection
	}
	
}


?>