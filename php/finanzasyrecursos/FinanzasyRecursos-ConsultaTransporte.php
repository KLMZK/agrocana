<?php
include "../../conexion/conexion.php";

$consulta = $conexion->query("
    SELECT 
        vehiculos.PLACA,
        vehiculos.TIPO,
        vehiculos.ESTADO,
        IFNULL(mantenimientos.FECHA,'S/M') as FECHA
    FROM vehiculos
    LEFT JOIN mantenimientos
        ON vehiculos.PLACA = mantenimientos.PLACA
");
header('Content-Type: application/json');
$vehiculos=[];

while($fila=$consulta->fetch_assoc()){
    $vehiculos[]=$fila;
}
echo json_encode($vehiculos);
?>