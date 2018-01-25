<?php

$servername = 'localhost';
$dbname = 'toolsforever';
$username = 'root';
$password = 'admin';


try {
	
	$dbConn = new PDO("mysql:host={$servername};dbname={$dbname}", $username, $password);
	
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

} catch(PDOException $e) {
	echo $e->getMessage();
}


 
?>