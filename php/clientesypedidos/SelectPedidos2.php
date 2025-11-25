<?php
include "../../conexion/conexion.php";

$sql = "SELECT C.NOMBRE AS CLIENTE, I.NOMBRE AS ITEM, EN.CANTIDAD AS CANTIDAD, I.UNIDAD AS UNIDAD, P.FECHAPEDIDO AS FECHAPEDIDO, E.ENTREGADO AS ENTREGADO, (I.PRECIOV*EN.CANTIDAD) AS TOTAL FROM pedidos AS P JOIN encarga AS En on P.CVE_PEDIDO = EN.CVE_PEDIDO JOIN items AS I ON I.CVE_ITEM = EN.CVE_ITEM JOIN compradores AS C ON P.CVE_COMPRADOR = C.CVE_COMPRADOR LEFT JOIN envios as E ON P.CVE_PEDIDO = E.CVE_PEDIDO";
$result = $conexion->query($sql);

$pedido = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pedido[] = $row;
    }
}
foreach ($pedido as &$fila) {
    if (!isset($fila['ENTREGADO']) || $fila['ENTREGADO'] === null || $fila['ENTREGADO'] == 0) {
        $fila['ENTREGADO'] = 'Pendiente';
    } else {
        $fila['ENTREGADO'] = 'Entregado';
    }
}
unset($fila);

echo json_encode($pedido);
?>