<?php
include "../../conexion/conexion.php";
header('Content-Type: application/json');

$gA = $conexion->query("SELECT SUM(COSTO) AS total FROM actividades WHERE MONTH(FECHA) = MONTH(CURDATE())AND YEAR(FECHA) = YEAR(CURDATE())")->fetch_assoc()['total'] ?? 0;
$gM = $conexion->query("SELECT SUM(COSTO) AS total FROM mantenimientos WHERE MONTH(FECHA) = MONTH(CURDATE())AND YEAR(FECHA) = YEAR(CURDATE())")->fetch_assoc()['total'] ?? 0;
$gE = $conexion->query("SELECT SUM(COSTO) AS total FROM envios WHERE MONTH(FECHASALIDA) = MONTH(CURDATE())AND YEAR(FECHASALIDA) = YEAR(CURDATE())")->fetch_assoc()['total'] ?? 0;
$gI = $conexion->query("SELECT SUM(CANTIDAD * PRECIOU) AS total FROM items")->fetch_assoc()['total'] ?? 0;//CHECAR

$totalGasto = $gA + $gM + $gE + $gI;

echo json_encode([
    "totalGastos" => $totalGasto
]);
?>