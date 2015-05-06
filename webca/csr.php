<?php
include('createCsrBack.php'); // Includes Login Script
?>
<!DOCTYPE html>
<html>
<head>
<title>Request a Certificate</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Request a Certificate</h1>
<h2>Certificate Signing Request Form</h2>
<form action="" method="post">
	<table>
		<tr>
			<td><textarea rows="10" cols="50" id="csr" name="csr" placeholder="paste your Certificate Signing Request here"></textarea></td>
		</tr>
		<tr>
			<td><input name="submit" type="submit" value="Submit"></td>
		</tr>
	</table>

<span><?php echo $msg; ?></span>
<?
if (isset($_POST['submit'])){
	print_r($csr);
}
?>
</form>
</div>
</div>
</body>
</html>