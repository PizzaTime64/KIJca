<?php
include('connection.php');
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else
	{
// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];
		$repassword=$_POST['repassword'];

// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = sha1($password);
		$repassword = sha1($repassword);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);

		if($password == $repassword){
	// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("insert into client (email,password) values ('$username','$username')", $connection);
			if ($query) {
				$_SESSION['login_user']=$username; // Initializing Session
				header("location: index.php"); // Redirecting To Other Page
			} else {
				$error = "Cannot insert data";
			}
			mysql_close($connection); // Closing Connection
		}
		else{
			$error = "Password is incorrect";
		}
	}
}


?>