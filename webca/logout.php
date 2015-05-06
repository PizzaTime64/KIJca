<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: signin.php"); // Redirecting To Home Page
}
?>