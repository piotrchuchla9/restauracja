<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "restauracja";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}


$query = mysqli_query($conn, "SELECT * FROM Menu WHERE Kategoria = 'Pizza'");

