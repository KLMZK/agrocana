<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$pendientes = 0;
$camino = 0;
$completos = 0;

$sqlPend = "SELECT COUNT(P.CVE_PEDIDO) AS total FROM pedidos P LEFT JOIN envios E ON E.CVE_PEDIDO = P.CVE_PEDIDO WHERE E.CVE_PEDIDO IS NULL OR (E.FECHASALIDA IS NOT NULL AND E.FECHASALIDA > NOW())";
if ($res = $conexion->query($sqlPend)) {
    $row = $res->fetch_assoc();
    $pendientes = (int)($row['total'] ?? 0);
}

$sqlCam = "SELECT COUNT(CVE_ENVIO) AS total FROM envios WHERE ENTREGADO = 0 AND FECHASALIDA <= NOW()";
if ($res = $conexion->query($sqlCam)) {
    $row = $res->fetch_assoc();
    $camino = (int)($row['total'] ?? 0);
}

$sqlComp = "SELECT COUNT(CVE_ENVIO) AS total FROM envios WHERE ENTREGADO = 1";
if ($res = $conexion->query($sqlComp)) {
    $row = $res->fetch_assoc();
    $completos = (int)($row['total'] ?? 0);
}

echo json_encode(['pendientes' => $pendientes, 'camino' => $camino, 'completos' => $completos]);

} else {
    header("location: ../../index.html");
}
?>