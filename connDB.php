<?php
$server ="localhost";
$dbName="pro";
$dbUser="root";
$dbPass="";

try{
	 $conn= new PDO ("mysql:host=$server;dbname=$dbName",$dbUser,$dbPass);
	 $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	 echo "failed " . $e->getMessage();
}