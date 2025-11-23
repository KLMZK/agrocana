<?php
include "../../conexion/conexion.php";

header('Content-Type: application/json');

$sqlIngresos = "
    SELECT SUM(INGRESO) AS total
    FROM pedidos
    WHERE MONTH(FECHAPEDIDO) = MONTH(CURDATE())
      AND YEAR(FECHAPEDIDO) = YEAR(CURDATE())
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
?>