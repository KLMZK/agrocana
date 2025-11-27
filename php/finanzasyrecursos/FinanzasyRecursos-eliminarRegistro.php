<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";


$placa = $conexion->real_escape_string($_POST['placa']);

if($conexion->query("DELETE FROM vehiculos WHERE PLACA='$placa'")){
    echo "Vehiculo eliminado correctamente.";
} else {
    echo "Error: " . $conexion->error;
}

} else {
    header("location: ../../index.html");
}
?>