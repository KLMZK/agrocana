<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

    include "../../conexion/conexion.php";

    $ingreso = isset($_GET['ingreso']) ? (int)$_GET['ingreso'] : null;

    $sqlGan = "SELECT COALESCE(SUM(E.CANTIDAD * I.PRECIOU),0) AS TOTAL
        FROM pedidos P
        LEFT JOIN encarga E ON E.CVE_PEDIDO = P.CVE_PEDIDO
        LEFT JOIN items I ON I.CVE_ITEM = E.CVE_ITEM
        WHERE YEAR(P.FECHAPEDIDO) = YEAR(NOW()) AND MONTH(P.FECHAPEDIDO) = MONTH(NOW()) AND P.INGRESO = '1'";
    $res1 = $conexion->query($sqlGan);
    $gananciaTotal = 0;
    if ($res1) {
        $row = $res1->fetch_assoc();
        $gananciaTotal = (float)($row['TOTAL'] ?? 0);
    }

    $sqlGas = "SELECT COALESCE(SUM(E.CANTIDAD * I.PRECIOU),0) AS TOTAL
        FROM pedidos P
        LEFT JOIN encarga E ON E.CVE_PEDIDO = P.CVE_PEDIDO
        LEFT JOIN items I ON I.CVE_ITEM = E.CVE_ITEM
        WHERE YEAR(P.FECHAPEDIDO) = YEAR(NOW()) AND MONTH(P.FECHAPEDIDO) = MONTH(NOW()) AND P.INGRESO = '0'";
    $res2 = $conexion->query($sqlGas);
    $gastoTotal = 0;
    if ($res2) {
        $row = $res2->fetch_assoc();
        $gastoTotal = (float)($row['TOTAL'] ?? 0);
    }

    $balance = $gananciaTotal - $gastoTotal;

    if ($ingreso === 0) {
        echo json_encode([['TOTAL' => $gananciaTotal]]);
        exit;
    }
    if ($ingreso === 1) {
        echo json_encode([['TOTAL' => $gastoTotal]]);
        exit;
    }
    if ($ingreso === 2) {
        echo json_encode([['TOTAL'=> $balance]]);
        exit;
    }
} else {
    header("location: ../../index.html");
}
?>