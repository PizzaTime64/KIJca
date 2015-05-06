<?php
include('File/X509.php');
include('Math/BigInteger.php');

//buka file CRL nya
$filename = "crl.bin";
$crlfile = fopen("crl.bin", "r");
$crlcontent = fread($crlfile, filesize($filename));

//tampilkan isi CRL nya
$x509 = new File_X509();
$crl = $x509->loadCRL($crlcontent); // see ev2009a.crl
print_r($crl);
echo $x509->validateSignature() ? 'valid' : 'invalid';
?>