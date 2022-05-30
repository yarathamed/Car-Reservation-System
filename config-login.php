<?php

//This PHP script is responsible for intiating a database connection
session_start();

//Host name
$host = "localhost";
//User
$user = "root";
//Password
$password = "";
//Database name
$dbname = "car_rental_system";
$mysqli = new mysqli('localhost', 'root', '', 'car_rental_system');

$con = mysqli_connect($host, $user, $password, $dbname);

//If connection is not initiated show error and kill session
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
