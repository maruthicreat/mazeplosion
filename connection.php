<?php
	/*$hostname = "localhost";
	$dbname   = "citcyber_cyberfest18";
	//$username = "citcyber_cit18";
	//$password = "cyb36f35t'18";
    $username = "root";
	$password = "MaruthiRaja";
	$connection = mysqli_connect($hostname, $username, $password, $dbname) or die(mysql_error());*/

$cyb = new PDO('mysql:host=localhost;dbname=citcyber_cyberfest18', 'root', 'MaruthiRaja');
$cyb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);