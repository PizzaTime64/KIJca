<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$connection = mysql_connect("localhost", "root", "root");
$connection = mysql_connect("192.168.1.103", "kij", "12345");
// Selecting Database
$db = mysql_select_db("kijca", $connection);
?>