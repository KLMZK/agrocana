<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

include "../../conexion/conexion.php";

$cve  = $_GET['cve'] ?? 'null';

if($cve == 'null'){

    $sql = "SELECT 
                P.CVE_PEDIDO AS CVE_PEDIDO,
                GROUP_CONCAT(I.NOMBRE SEPARATOR ', ') AS ITEMS,
                SUM(EN.CANTIDAD) AS TOTAL_CANTIDAD,
                I.UNIDAD AS UNIDAD,
                P.FECHAPEDIDO AS FECHAPEDIDO,
                E.ENTREGADO AS ENTREGADO,
                SUM(I.PRECIOU * EN.CANTIDAD) AS TOTAL
            FROM pedidos AS P
            LEFT JOIN encarga AS EN ON EN.CVE_PEDIDO = P.CVE_PEDIDO
            LEFT JOIN items AS I ON I.CVE_ITEM = EN.CVE_ITEM
            LEFT JOIN envios AS E ON E.CVE_PEDIDO = P.CVE_PEDIDO
            GROUP BY P.CVE_PEDIDO, I.UNIDAD, P.FECHAPEDIDO, E.ENTREGADO;";

} else {

    $sql = "SELECT 
                P.CVE_PEDIDO AS CVE_PEDIDO,
                GROUP_CONCAT(I.NOMBRE SEPARATOR ', ') AS ITEMS,
                SUM(EN.CANTIDAD) AS TOTAL_CANTIDAD,
                I.UNIDAD AS UNIDAD,
                P.FECHAPEDIDO AS FECHAPEDIDO,
                E.ENTREGADO AS ENTREGADO,
                SUM(I.PRECIOU * EN.CANTIDAD) AS TOTAL
            FROM pedidos AS P
            LEFT JOIN encarga AS EN ON EN.CVE_PEDIDO = P.CVE_PEDIDO
            LEFT JOIN items AS I ON I.CVE_ITEM = EN.CVE_ITEM
            LEFT JOIN envios AS E ON E.CVE_PEDIDO = P.CVE_PEDIDO
            WHERE P.CVE_PEDIDO = '$cve' GROUP BY P.CVE_PEDIDO, I.UNIDAD, P.FECHAPEDIDO, E.ENTREGADO";

}
$result = $conexion->query($sql);

$pedido = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pedido[] = $row;
    }
}
foreach ($pedido as &$fila) {
    if (!isset($fila['ENTREGADO']) || $fila['ENTREGADO'] === null || $fila['ENTREGADO'] == 0) {
        $fila['ENTREGADO'] = 'No entregado';
    } else {
        $fila['ENTREGADO'] = 'Entregado';
    }
}
unset($fila);

echo json_encode($pedido);

} else {
    header("location: ../../index.html");
}
?>