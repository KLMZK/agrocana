<?php
include "../../conexion/conexion.php";
header('Content-Type: application/json');

$historial = [];

$sql = "SELECT compradores.NOMBRE, compradores.TIPO, 
    (items.PRECIOU*encarga.CANTIDAD) AS COSTO, pedidos.FECHAENTREGA AS FECHA
    FROM compradores 
    INNER JOIN pedidos ON pedidos.CVE_COMPRADOR=compradores.CVE_COMPRADOR 
    INNER JOIN encarga ON pedidos.CVE_PEDIDO=encarga.CVE_PEDIDO 
    INNER JOIN items ON items.CVE_ITEM=encarga.CVE_ITEM 
    WHERE compradores.TIPO IS NOT NULL 
    AND MONTH(FECHAENTREGA)=MONTH(CURDATE()) AND YEAR(FECHAENTREGA)=YEAR(CURDATE())";
$r = $conexion->query($sql);
while ($row = $r->fetch_assoc()) $historial[] = $row;

echo json_encode($historial);
?>
