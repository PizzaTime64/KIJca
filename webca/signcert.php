<?php
include('Net/SSH2.php');
include('File/X509.php');
include('Crypt/RSA.php');

// Load CA privaate key from file "ca.key"
$CAPrivKey = new Crypt_RSA();
$privatekeyfile = fopen("ca.key", "r");
$privatekey = fread($privatekeyfile, 4096);
$CAPrivKey->loadKey($privatekey);

echo "the private key for the CA cert (can be discarded):\r\n\r\n";
echo $privatekey;
echo "\r\n\r\n";


//get CSR data from DB
//$query = "SELECT .... FROM csr WHERE id = '$id';";
//$hasil = mysql_query($query);
//$row = mysql_fetch_array($hasil);



// create private key / x.509 cert for stunnel / website
$privKey = new Crypt_RSA();
extract($privKey->createKey());
$privKey->loadKey($privatekey);

$pubKey = new Crypt_RSA();
$pubKey->loadKey($publickey);
$pubKey->setPublicKey();

$subject = new File_X509();
$subject->setPublicKey($pubKey);
$subject->setDNProp('TESTPHPSECLIB', 'DEMOGAN');


$issuer = new File_X509();
$issuer->setPrivateKey($CAPrivKey);
$issuer->setDNProp('KIJ C CA', 'Certificate authority');
$issuer->setDomain('hadrianbs.web.id/kijca');
$issuer->setDN($issuer->getDN());



$x509 = new File_X509();
$result = $x509->sign($issuer, $subject);
echo "Certificate";
//echo $privKey->getPrivateKey();
//echo "\r\n";
$certificate = $x509->saveX509($result, FILE_X509_FORMAT_PEM);
$certificate = addslashes($certificate);
echo $certificate;
echo "\r\n";

?>