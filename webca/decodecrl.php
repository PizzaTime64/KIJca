<?php
include('File/X509.php');
include('Math/BigInteger.php');

//buka file CRL nya
$filename = "crl.pem";
$crlfile = fopen("crl.pem", "r");
$crlcontent = fread($crlfile, filesize($filename));

//tampilkan isi CRL nya
$x509 = new File_X509();
$crl = $x509->loadCRL($crlcontent);
print_r($crl);
//echo $x509->validateSignature() ? 'valid' : 'invalid';
?>