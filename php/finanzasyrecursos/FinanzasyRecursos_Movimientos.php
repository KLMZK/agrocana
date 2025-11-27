<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";
header('Content-Type: application/json');

$movimientos = [];

$sql = "SELECT 'Mano de Obra' AS categoria, TIPO AS nombre,
        FECHA, COSTO AS monto, 0 AS tipo
        FROM actividades 
        WHERE MONTH(FECHA)=MONTH(CURDATE()) AND YEAR(FECHA)=YEAR(CURDATE())";
$r = $conexion->query($sql);
while ($row = $r->fetch_assoc()) $movimientos[] = $row;

$sql = "SELECT 'Mantenimiento' AS categoria, PLACA AS nombre,
        FECHA, COSTO AS monto, 0 AS tipo
        FROM mantenimientos
        WHERE MONTH(FECHA)=MONTH(CURDATE()) AND YEAR(FECHA)=YEAR(CURDATE())";
$r = $conexion->query($sql);
while ($row = $r->fetch_assoc()) $movimientos[] = $row;

$sql = "SELECT 'Envios' AS categoria, items.NOMBRE AS nombre,
        FECHASALIDA AS FECHA, COSTO AS monto, 0 AS tipo
        FROM envios
        LEFT JOIN pedidos ON pedidos.CVE_PEDIDO=envios.CVE_PEDIDO
        LEFT JOIN encarga ON pedidos.CVE_PEDIDO=encarga.CVE_PEDIDO
        LEFT JOIN items ON items.CVE_ITEM=encarga.CVE_ITEM
        WHERE MONTH(FECHASALIDA)=MONTH(CURDATE()) AND YEAR(FECHASALIDA)=YEAR(CURDATE())";
$r = $conexion->query($sql);
while ($row = $r->fetch_assoc()) $movimientos[] = $row;

$sql = "SELECT 'Compra' AS categoria, items.NOMBRE AS nombre,
        pedidos.FECHAPEDIDO AS FECHA, (encarga.CANTIDAD * items.PRECIOU) AS monto, 0 AS tipo
        FROM items
        LEFT JOIN encarga ON encarga.CVE_ITEM = items.CVE_ITEM
        LEFT JOIN pedidos ON pedidos.CVE_PEDIDO = encarga.CVE_PEDIDO
        WHERE MONTH(pedidos.FECHAPEDIDO) = MONTH(CURDATE())
        AND YEAR(pedidos.FECHAPEDIDO)  = YEAR(CURDATE()) 
        AND pedidos.INGRESO=0";
$r = $conexion->query($sql);
while ($row = $r->fetch_assoc()) $movimientos[] = $row;

$sql = "SELECT 'Venta' AS categoria, items.NOMBRE AS nombre,
        pedidos.FECHAPEDIDO AS FECHA, (encarga.CANTIDAD * items.PRECIOU) AS monto, 1 AS tipo
        FROM items
        LEFT JOIN encarga ON encarga.CVE_ITEM = items.CVE_ITEM
        LEFT JOIN pedidos ON pedidos.CVE_PEDIDO = encarga.CVE_PEDIDO
        WHERE MONTH(pedidos.FECHAPEDIDO) = MONTH(CURDATE())
        AND YEAR(pedidos.FECHAPEDIDO)  = YEAR(CURDATE()) 
        AND pedidos.INGRESO=1";
$r = $conexion->query($sql);
while ($row = $r->fetch_assoc()) $movimientos[] = $row;

echo json_encode($movimientos);

} else {
    header("location: ../../index.html");
}
?>
