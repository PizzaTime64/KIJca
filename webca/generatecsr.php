<?php
include('File/X509.php');
include('Crypt/RSA.php');

//generate new private key from scratch
$privKey = new Crypt_RSA();
extract($privKey->createKey());
$privKey->loadKey($privatekey);

$x509 = new File_X509();
$x509->setPrivateKey($privKey);
$x509->setDNProp('id-at-organizationName', 'phpseclib demo cert');

$csr = $x509->signCSR();

echo $x509->saveCSR($csr);
?>