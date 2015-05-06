<?php
include('connection.php');
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username,level from tbluser where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
$level_session =$row['level'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: signin.php'); // Redirecting To Home Page
}
?>