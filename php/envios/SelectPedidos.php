<?php
include "../../conexion/conexion.php";

$sql = "SELECT CVE_PEDIDO FROM pedidos EXCEPT (SELECT * FROM pedidos AS p, envios AS E WHERE E.CVE_PEDIDO = P.CVE_PEDIDO)";
$result = $conexion->query($sql);

$pedidos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pedidos[] = $row;
    }
}
echo json_encode($pedidos);
?>