<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $conexion->real_escape_string($data["id"]);
$nombre = $conexion->real_escape_string($data["nombre"]);
$insumo = $conexion->real_escape_string($data["insumo"]);
$telefono = $conexion->real_escape_string($data["telefono"]);
$correo = $conexion->real_escape_string($data["correo"]);
$notas = $conexion->real_escape_string($data["notas"]);

$updatProveedor = "
UPDATE compradores SET 
    NOMBRE='$nombre',
    TIPO='$insumo',
    TELEFONO='$telefono',
    CORREO='$correo',
    NOTAS='$notas'
WHERE CVE_COMPRADOR='$id'
";

if ($conexion->query($updatProveedor)) {
    echo "OK";
} else {
    echo "Error: " . $conexion->error;
}

} else {
    header("location: ../../index.html");
}
?>
