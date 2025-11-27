<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

header('Content-Type: application/json');

$sqlIngresos = "
SELECT SUM(encarga.CANTIDAD * items.PRECIOU) 
AS total FROM items
LEFT JOIN encarga ON encarga.CVE_ITEM = items.CVE_ITEM
LEFT JOIN pedidos ON pedidos.CVE_PEDIDO = encarga.CVE_PEDIDO
WHERE MONTH(pedidos.FECHAPEDIDO) = MONTH(CURDATE())
AND YEAR(pedidos.FECHAPEDIDO)  = YEAR(CURDATE()) 
AND pedidos.INGRESO=1
";

$result = $conexion->query($sqlIngresos);

if (!$result) {
    echo json_encode([
        "error" => $conexion->error
    ]);
    exit;
}

$row = $result->fetch_assoc();
$totalIngresos = $row['total'] ?? 0;

echo json_encode([
    "totalIngresos" => $totalIngresos
]);

} else {
    header("location: ../../index.html");
}
?>