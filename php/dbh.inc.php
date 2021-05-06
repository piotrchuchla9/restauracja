<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "restauracja";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}


$pizze = mysqli_query($conn, "SELECT * FROM Menu WHERE Kategoria = 'Pizza'");

$zupy = mysqli_query($conn, "SELECT * FROM Menu WHERE Kategoria = 'Zupa'");

$sushi = mysqli_query($conn, "SELECT * FROM Menu WHERE Kategoria = 'Sushi'");

$pierogi = mysqli_query($conn, "SELECT * FROM Menu WHERE Kategoria = 'Pierogi'");