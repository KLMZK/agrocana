<?php
include "../../conexion/conexion.php";
header('Content-Type: application/json');

$gActividades = $conexion->query("SELECT SUM(COSTO) AS total FROM actividades WHERE MONTH(FECHA) = MONTH(CURDATE())AND YEAR(FECHA) = YEAR(CURDATE())")->fetch_assoc()['total'] ?? 0;
$gMantenimientos = $conexion->query("SELECT SUM(COSTO) AS total FROM mantenimientos WHERE MONTH(FECHA) = MONTH(CURDATE())AND YEAR(FECHA) = YEAR(CURDATE())")->fetch_assoc()['total'] ?? 0;
$gEnvios = $conexion->query("SELECT SUM(COSTO) AS total FROM envios WHERE MONTH(FECHASALIDA) = MONTH(CURDATE())AND YEAR(FECHASALIDA) = YEAR(CURDATE())")->fetch_assoc()['total'] ?? 0;
$gInsumos = $conexion->query(
"SELECT SUM(encarga.CANTIDAD * items.PRECIOU) 
AS total FROM items
LEFT JOIN encarga ON encarga.CVE_ITEM = items.CVE_ITEM
LEFT JOIN pedidos ON pedidos.CVE_PEDIDO = encarga.CVE_PEDIDO
WHERE MONTH(pedidos.FECHAPEDIDO) = MONTH(CURDATE())
AND YEAR(pedidos.FECHAPEDIDO)  = YEAR(CURDATE()) 
AND pedidos.INGRESO=0")->fetch_assoc()['total'] ?? 0;

$totalGasto = $gActividades + $gMantenimientos + $gEnvios + $gInsumos;

echo json_encode([
    "gActividades" => $gActividades,
    "gMantenimientos" => $gMantenimientos,
    "gEnvios" => $gEnvios,
    "gInsumos" => $gInsumos,
    "totalGastos" => $totalGasto
]);
?>