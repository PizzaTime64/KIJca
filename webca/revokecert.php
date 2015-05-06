<?php
require_once 'Crypt/RSA.php';
require_once 'File/X509.php';

// Load the CA and its private key.
$pemcakey = file_get_contents('ca.key');
$cakey = new Crypt_RSA();
$cakey->loadKey($pemcakey);
$pemca = file_get_contents('ca.crt');
$ca = new File_X509();
$ca->loadX509($pemca);
$ca->setPrivateKey($cakey);

// Load the CRL.
$crl = new File_X509();
$crl->loadCA($pemca); // For later signature check.
$pemcrl = file_get_contents('crl.pem');
$crl->loadCRL($pemcrl);

// Validate the CRL.
//if ($crl->validateSignature() !== 1) {
//    exit("CRL signature is invalid\n");
//}

// Update the revocation list.
$crl->setRevokedCertificateExtension('4321', 'id-ce-cRLReasons', 'COBAGAN');

// Generate the new CRL.
$crl->setEndDate('+3 months');
$newcrl = $crl->signCRL($ca, $crl);

// Output it.
echo $crl->saveCRL($newcrl) . "\n";