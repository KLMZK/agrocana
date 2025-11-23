<?php
include "../../conexion/conexion.php";

$data = json_decode(file_get_contents("php://input"), true);

$tipo = $conexion->real_escape_string($data["tipo"]);
$placa = $conexion->real_escape_string($data["placa"]);
$observaciones = $conexion->real_escape_string($data["observaciones"]);
$fecha = $conexion->real_escape_string($data["fecha"]);
$modelo = $conexion->real_escape_string($data["modelo"]);
$marca = $conexion->real_escape_string($data["marca"]);
$estado = $conexion->real_escape_string($data["estado"]);

$sql = "SELECT CVE_MODELO FROM modelos WHERE NOMBRE = '$modelo'";
$result = $conexion->query($sql);

if($result && $result->num_rows > 0){
    $row = $result->fetch_assoc();
    $cve_modelo = $row['CVE_MODELO'];}

$updateVehiculos = "
UPDATE vehiculos SET 
    TIPO='$tipo',
    CVE_MODELO='$cve_modelo',
    OBSERVACIONES='$observaciones',
    ESTADO='$estado',
    FECHA='$fecha'
WHERE PLACA='$placa'
";

$updateModelos = "
UPDATE modelos SET 
    CVE_MARCA='$marca',
    NOMBRE='$modelo'
WHERE CVE_MODELO='$cve_modelo'
";

if ($conexion->query($updateVehiculos) && $conexion->query($updateModelos)) {
    echo "OK";
} else {
    echo "Error: " . $conexion->error;
}
?>
