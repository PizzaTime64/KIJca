<?php
include('File/X509.php');
include('Crypt/RSA.php');

// untuk buat root
$pemcaprivkey = file_get_contents('kijCA.key');
$privKey = new Crypt_RSA();
//extract($privKey->createKey());
$privKey->loadKey($pemcaprivkey);

$pemcapubkey = file_get_contents('kijCApublic.key');
$pubKey = new Crypt_RSA();
$pubKey->loadKey($pemcapubkey);
$pubKey->setPublicKey();

$subject = new File_X509();
$subject->setDNProp('id-at-organizationName', 'KIJCA HBS');
$subject->setPublicKey($pubKey);

$issuer = new File_X509();
$issuer->setPrivateKey($privKey);
$issuer->setDN($subject->getDN());

$x509 = new File_X509();

$result = $x509->sign($issuer, $subject);
echo "CA ROOT CERTIFICATE:\r\n\r\n";
echo $privKey->getPrivateKey();
echo "\r\n";
echo $x509->saveX509($result);
echo "\r\n";
?>