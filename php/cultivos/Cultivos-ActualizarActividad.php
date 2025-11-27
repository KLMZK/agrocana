<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $conexion->real_escape_string($data["id"]);
$actividad = $conexion->real_escape_string($data["actividad"]);
$fecha = $conexion->real_escape_string($data["fecha"]);
$responsable = $conexion->real_escape_string($data["responsable"]);
$insumos = $conexion->real_escape_string($data["insumos"]);
$cinsumo = $conexion->real_escape_string($data["cinsumo"]);
$costo = $conexion->real_escape_string($data["costo"]);
$ccultivo = $conexion->real_escape_string($data["ccultivo"]);
$observaciones = $conexion->real_escape_string($data["observaciones"]);
$estado=$conexion->real_escape_string($data["estado"]);

$result = $conexion->query("SELECT CVE_CULTIVO FROM cultivos WHERE CVE_TERRENO='$ccultivo'");
$row = $result->fetch_assoc();
$cveCultivo = $row['CVE_CULTIVO'];

$updateActividad = "
UPDATE actividades SET 
    CVE_CULTIVO='$cveCultivo',
    CVE_RESPONSABLE='$responsable',
    TIPO='$actividad',
    FECHA='$fecha',
    OBSERVACIONES='$observaciones',
    COSTO='$costo',
    ESTADO='$estado'
WHERE CVE_ACTIVIDAD='$id'
";

$updateInsumo = "
UPDATE utiliza SET 
    CVE_ITEM='$insumos',
    CANTIDAD='$cinsumo'
WHERE CVE_ACTIVIDAD='$id'
";


if ($conexion->query($updateActividad)  
    && $conexion->query($updateInsumo)) {
    echo json_encode(["status"=>"OK"]);
} else {
    echo json_encode(["status"=>"ERROR", "error"=>$conexion->error]);
}

} else {
    header("location: ../../index.html");
}
?>
