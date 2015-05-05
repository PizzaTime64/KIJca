<?php
include('File/X509.php');
include('Crypt/RSA.php');

// create private key / x.509 cert for stunnel / website

$privKey = new Crypt_RSA();
extract($privKey->createKey());
$privKey->loadKey($privatekey);

$pubKey = new Crypt_RSA();
$pubKey->loadKey($publickey);
$pubKey->setPublicKey();

$subject = new File_X509();
$subject->setDNProp('id-at-organizationName', 'phpseclib demo cert');
$subject->setPublicKey($pubKey);

$issuer = new File_X509();
$issuer->setPrivateKey($privKey);
$issuer->setDN($subject->getDN());

$x509 = new File_X509();

$result = $x509->sign($issuer, $subject);
echo "the stunnel.pem contents are as follows:\r\n\r\n";
echo $privKey->getPrivateKey();
echo "\r\n";
echo $x509->saveX509($result);
echo "\r\n";
$x509file = fopen("ca_cert.crt", "w");
fwrite($x509file, $x509->saveX509($result));
fclose($x509file);

$keyfile = fopen("ca.key", "w");
fwrite($keyfile, $privKey->getPrivateKey());
fclose($keyfile);
?>