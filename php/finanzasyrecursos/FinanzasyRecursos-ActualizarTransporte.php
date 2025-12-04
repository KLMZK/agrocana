<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$data = json_decode(file_get_contents("php://input"), true);

$placaO = $conexion->real_escape_string($data["placaO"]);
$tipo = $conexion->real_escape_string($data["tipo"]);
$placa = $conexion->real_escape_string($data["placa"]);
$observaciones = $conexion->real_escape_string($data["observaciones"]);
$fecha = $conexion->real_escape_string($data["fecha"]);
$modelo = $conexion->real_escape_string($data["modelo"]);
$marca = $conexion->real_escape_string($data["marca"]);
$estado = $conexion->real_escape_string($data["estado"]);

$updateVehiculos = "
UPDATE vehiculos SET 
    TIPO='$tipo',
    CVE_MODELO='$modelo',
    OBSERVACIONES='$observaciones',
    ESTADO='$estado',
    FECHA='$fecha',
    PLACA='$placa'
WHERE PLACA='$placaO'
";

if ($conexion->query($updateVehiculos)) {
    echo "OK";
} else {
    echo "Error: " . $conexion->error;
}

} else {
    header("location: ../../index.html");
}
?>
