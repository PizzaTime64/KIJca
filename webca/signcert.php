<?php
include('Net/SSH2.php');
include('File/X509.php');
include('Crypt/RSA.php');
include('connection.php');

// Load CA privaate key from file "ca.key"
$CAPrivKey = new Crypt_RSA();
$privatekeyfile = fopen("ca.key", "r");
$privatekey = fread($privatekeyfile, 4096);
$CAPrivKey->loadKey($privatekey);

echo "the private key for the CA cert (can be discarded):\r\n\r\n";
//echo $privatekey;
echo "\r\n\r\n";


//get CSR data from DB
$query = "SELECT pubkey, name FROM client WHERE id =2;";
$hasil = mysql_query($query);
$row = mysql_fetch_array($hasil);
$publickey = $row[0];
$nama = $row[1];

$pubKey = new Crypt_RSA();
$pubKey->loadKey($publickey);
$pubKey->setPublicKey();

$subject = new File_X509();
$subject->setPublicKey($pubKey);
$subject->setDNProp($nama, $nama);
$subject->setDomain($nama);


$issuer = new File_X509();
$issuer->setPrivateKey($CAPrivKey);
$issuer->setDNProp('KIJ C CA', 'Certificate authority');
$issuer->setDomain('hadrianbs.web.id');
$issuer->setDN($issuer->getDN());


$x509 = new File_X509();
$x509->setStartDate('-1 month');
$x509->setEndDate('+1 month');

//sign CRS
$result = $x509->sign($issuer, $subject);
echo "Certificate";
//echo $privKey->getPrivateKey();
//echo "\r\n";
echo $publickey;
$certificate = $x509->saveX509($result, FILE_X509_FORMAT_PEM);
$certificate = addslashes($certificate);
echo $certificate;
echo "\r\n";
$query = "UPDATE client SET certificate='$certificate' WHERE id = 2;";
$res = mysql_query($query);

?>