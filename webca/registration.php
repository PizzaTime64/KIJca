<?php
include('registrationBack.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Create new user</h1>
<div id="login">
<h2>Login Form</h2>
<form action="" method="post">
	<table>
		<tr>
			<td><label>Email</label></td>
			<td><input id="name" name="username" placeholder="username" type="text"></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td><input id="password" name="password" placeholder="**********" type="password"></td>
		</tr>
		<tr>
			<td><label>Confirm Password</label></td>
			<td><input id="repassword" name="repassword" placeholder="**********" type="password"><br/></td>
		</tr>
		<tr>
			<td></td>
			<td><input name="submit" type="submit" value=" Sign Up "></td>
		</tr>
	</table>

<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>