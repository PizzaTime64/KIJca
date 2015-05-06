<?php
include('session.php');
//include('decodecsr.php');
include('File/X509.php');
include('Math/BigInteger.php');

$msg=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
	if (empty($_POST['csr']) ) {
		$error = "Certificate Signing Request is invalid";
	}
	else
	{
// Define post variable
		$cert=$_POST['csr'];


		$x509 = new File_X509();
		$csr = $x509->loadCSR($cert); // see csr.csr

		$DN = $x509->getDN();

//Certificate variable
		$country = $DN["rdnSequence"][0][0]["value"]["printableString"];
		$state = $DN["rdnSequence"][1][0]["value"]["printableString"];
		$locality = $DN["rdnSequence"][2][0]["value"]["printableString"];
		$organization = $DN["rdnSequence"][3][0]["value"]["printableString"];
		$organizationUnit = $DN["rdnSequence"][4][0]["value"]["printableString"];
		$name = $DN["rdnSequence"][5][0]["value"]["printableString"];
		$emailCert = $DN["rdnSequence"][6][0]["value"]["ia5String"];
		$publicKey = $x509->getPublicKey();;
		
		$user = $_SESSION['login_user'];
		
// SQL query
		$query = mysql_query("insert into tblcertificate (id, country, state, locality, org, orgUnit, name, email, signed, revoked, owner, pubKey) VALUES (NULL, '$country', '$state', '$locality', '$organization', '$organizationUnit', '$name', '$emailCert',0, 0, '$user','$publicKey')", $connection);

		//$query = mysql_query("update client set country='$country', state = '$state', locality = '$locality', organization = '$organization', organizationUnit = '$organizationUnit', name = '$name', emailCert = '$emailCert', pubkey = '$publicKey' where email = '$email'  ", $connection);
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