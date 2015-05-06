<?php
include('session.php');
//include('decodecsr.php');
include('File/X509.php');
include('Math/BigInteger.php');

$msg=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {

//Certificate variable
		$country = $_POST['country'];
		$state = $_POST['state'];
		$locality = $_POST['locality'];
		$organization = $_POST['org'];
		$organizationUnit = $_POST['orgUnit'];
		$name = $_POST['name'];
		$emailCert = $_POST['email'];
		$publicKey = $_POST['pubkey'];

		//echo $country.$state.$locality.$organization.$organizationUnit.$name.$emailCert.$publicKey;
		//$msh = $country.$state.$locality.$organization.$organizationUnit.$name.$emailCert.$publicKey;
		$user = $_SESSION['login_user'];
		
// SQL query
		$query = mysql_query("insert into tblcertificate (id, country, state, locality, org, orgUnit, name, email, signed, revoked, owner, pubKey) VALUES (NULL, '$country', '$state', '$locality', '$organization', '$organizationUnit', '$name', '$emailCert',0, 0, '$user','$publicKey')", $connection);

		//$query = mysql_query("update client set country='$country', state = '$state', locality = '$locality', organization = '$organization', organizationUnit = '$organizationUnit', name = '$name', emailCert = '$emailCert', pubkey = '$publicKey' where email = '$email'  ", $connection);
		if ($query) {
			$msg = "Certificate Signing Request was submitted";
		} else {
			$error = "Cannot submit Certificate Signing Request";
			die('Invalid query: ' . mysql_error());
		}
		mysql_close($connection); // Closing Connection
	}
	



?>