<?php
$server = 'localhost';
$username = 'root';
$password = 'tdrocks';
$database = 'sms';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}