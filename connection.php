<?php
if(!isset($_SESSION))
{
	// for session in front end.
	session_name("msi_scrapping"); // using session name
	session_start();
}

// set the db 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'my-database';

$con  = mysqli_connect($host, $username, $password,
$dbname);
		
?>