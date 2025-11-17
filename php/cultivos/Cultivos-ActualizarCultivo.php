<?php
include "../../conexion/conexion.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $conexion->real_escape_string($data["id"]);
$lote = $conexion->real_escape_string($data["lote"]);
$observaciones = $conexion->real_escape_string($data["observaciones"]);
$fsiembra = $conexion->real_escape_string($data["fsiembra"]);
$fcosecha = $conexion->real_escape_string($data["fcosecha"]);
$hectareas = $conexion->real_escape_string($data["hectareas"]);
$estado = $conexion->real_escape_string($data["estado"]);

$updateCultivo = "
UPDATE cultivos SET 
    FECHASIEMBRA='$fsiembra',
    FECHACOSECHA='$fcosecha',
    OBSERVACIONES='$observaciones',
    ESTADO='$estado'
WHERE CVE_CULTIVO='$id'
";
$result = $conexion->query("SELECT CVE_TERRENO FROM cultivos WHERE CVE_CULTIVO='$id'");
$row = $result->fetch_assoc();
$cveTerreno = $row['CVE_TERRENO'];

$updateTerreno = "
UPDATE terrenos SET 
    NOMBRE='$lote',
    HECTAREAS='$hectareas'
WHERE CVE_TERRENO='$cveTerreno'
";

if ($conexion->query($updateCultivo) && $conexion->query($updateTerreno)) {
    echo "OK";
} else {
    echo "Error: " . $conexion->error;
}
?>
