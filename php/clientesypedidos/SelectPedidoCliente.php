<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

include "../../conexion/conexion.php";

$cliente = $_GET['id'];

$sql = "SELECT P.FECHAPEDIDO AS FECHAPEDIDO, E.CANTIDAD*I.PRECIOU AS TOTAL FROM items AS I LEFT JOIN encarga AS E ON E.CVE_ITEM = I.CVE_ITEM LEFT JOIN pedidos AS P ON E.CVE_PEDIDO = P.CVE_PEDIDO WHERE P.FECHAPEDIDO = (SELECT MAX(FECHAPEDIDO) FROM pedidos WHERE CVE_COMPRADOR = '$cliente') AND P.CVE_COMPRADOR = '$cliente'";
$result = $conexion->query($sql);

$pedido = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pedido[] = $row;
    }
}

echo json_encode($pedido);

} else {
    header("location: ../../index.html");
}
?>