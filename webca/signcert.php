<?php
include('Net/SSH2.php');
include('File/X509.php');
include('Crypt/RSA.php');
include('connection.php');

if (!empty($_POST['id']) ) {
$error = "Username or Password is invalid";

$id = $_POST['id'];

// Load CA privaate key from file "ca.key"
$CAPrivKey = new Crypt_RSA();
$privatekeyfile = fopen("kijCA.key", "r");
$privatekey = fread($privatekeyfile, 4096);
$CAPrivKey->loadKey($privatekey);

//echo "the private key for the CA cert (can be discarded):\r\n\r\n";
//echo $privatekey;
//echo "\r\n\r\n";

//get CSR data from DB
$query = "SELECT country, state, locality, org, orgUnit, name, email, id, pubKey FROM tblcertificate WHERE id = $id;";
$hasil = mysql_query($query);
if($hasil === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

$row = mysql_fetch_array($hasil);
$country = $row[0];
$state = $row[1];
$locality = $row[2];
$org = $row[3];
$orgUnit = $row[4];
$name = $row[5];
$email = $row[6];
$serial = $row[7];
$publickey = $row[8];

//echo $country;
//echo $serial;
//echo $publickey;

$pubKey = new Crypt_RSA();
$pubKey->loadKey($publickey);
$pubKey->setPublicKey();

$subject = new File_X509();
$subject->setPublicKey($pubKey);
$subject->setDNProp($country, $org, $name, $state, $locality, $serial);
$subject->setDomain('hadrianbs.web.id');


$issuer = new File_X509();
$issuer->setPrivateKey($CAPrivKey);
$issuer->setDNProp('KIJ C CA', 'Certificate authority');
$issuer->setDomain('hadrianbs.web.id/kijca');
$issuer->setDN($issuer->getDN());



$x509 = new File_X509();
$x509->setStartDate('-1 month');
$x509->setEndDate('+1 year');
$x509->setSerialNumber(chr($serial));
$result = $x509->sign($issuer, $subject);

//echo "Certificate";
//echo $privKey->getPrivateKey();
//echo "\r\n";
$certificate = $x509->saveX509($result, FILE_X509_FORMAT_PEM);
$certificate = addslashes($certificate);
//echo $certificate;
//echo "\r\n";
$query = "update tblcertificate set certificate = '$certificate', signed = 1 where id = '$id';";
$hasil = mysql_query($query);
if($hasil === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
header('Location: viewscr.php');
}
?>