<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$cve  = $_GET['cve'] ?? '';

if($cve == ""){
    $sql = "SELECT CVE_ITEM, NOMBRE FROM items WHERE CATEGORIA = 'Vendibles' AND CANTIDAD > '0'";
} else {
    $ingreso="SELECT INGRESO FROM pedidos WHERE CVE_PEDIDO = '$cve'";
    $result = $conexion -> query($ingreso);

    $row = $result->fetch_assoc();
    $ingreso = $row['INGRESO'];
    
    if($ingreso === '1' || $ingreso === 1){
        $sql = "SELECT CVE_ITEM, NOMBRE FROM items WHERE CATEGORIA = 'Vendibles'";
    } else {
        $sql = "SELECT CVE_ITEM, NOMBRE FROM items";
    }
}
$result = $conexion -> query($sql);

$productos = [];
if($result->num_rows > 0) {
    while($row = $result ->fetch_assoc()){
        $productos[] = $row;
    }
}
echo json_encode($productos);

} else {
    header("location: ../../index.html");
}
?>