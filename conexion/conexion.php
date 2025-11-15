<?php

$server = "localhost";
$username = "agrocana";
$password = "123";
$database = "agrocana";
$conexion = mysqli_connect($server, $username, $password, $database);
if(!$conexion) die("Conexion fallida: " . mysqli_connect_error());

?>