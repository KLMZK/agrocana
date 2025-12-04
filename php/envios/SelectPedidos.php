<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$cve = $_GET['cve']??'null';

if($cve == 'null'){
$sql = "SELECT P.CVE_PEDIDO FROM pedidos P LEFT JOIN envios E ON E.CVE_PEDIDO = P.CVE_PEDIDO WHERE E.CVE_PEDIDO IS NULL";
} else {
    $sql = "SELECT CVE_PEDIDO FROM pedidos";
}
$result = $conexion->query($sql);

$pedidos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $pedidos[] = $row;
    }
}
echo json_encode($pedidos);

} else {
    header("location: ../../index.html");
}
?>