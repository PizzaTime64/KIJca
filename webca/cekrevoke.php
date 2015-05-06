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
$pemcrl = file_get_contents('crl.pem'); //isi CRL nya
$crl->loadCRL($pemcrl);

 //Validate the CRL.
if ($crl->validateSignature() !== 1) {
    exit("CRL signature is invalid\n");
}

// Load the certificate to check.
$x509 = new File_X509();
$x509->loadCA($pemca);
$cert = $x509->loadX509(file_get_contents('signed.crt')); //load certificate yang mau di CHECK
if ($x509->validateSignature() !== 1) {
    exit("Certificate signature is invalid\n");
}

// Get the certificate's serial number.
$csn = $cert['tbsCertificate']['serialNumber']->toString();

// Check certificate revocation status.
$revoked = $crl->getRevoked($csn);

if (empty($revoked)) {
    exit("certificate is not revoked\n");
}

echo 'certificate has been revoked on ' . implode('', $revoked['revocationDate']);
$reason = $crl->getRevokedCertificateExtension($csn, 'id-ce-cRLReasons');
if (!empty($reason)) {
    echo "; reason is $reason";
}
exit(".\n");