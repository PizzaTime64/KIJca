<?php
include('File/X509.php');
include('Math/BigInteger.php');

$pemca = file_get_contents('ca.crt');
$x509 = new File_X509();
$x509->loadCA($pemca);

$cert = $x509->loadX509(file_get_contents('signed.crt'));
echo $x509->validateSignature() ? 'valid' : 'invalid';
?>