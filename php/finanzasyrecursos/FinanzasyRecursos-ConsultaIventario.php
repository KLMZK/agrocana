<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$consulta = $conexion->query("
    SELECT 
        items.NOMBRE,
        items.CATEGORIA,
        items.CANTIDAD,
        bodegas.NOMBRE AS UBICACION,
        items.ESTADO
    FROM items
    LEFT JOIN tiene ON items.CVE_ITEM = tiene.CVE_ITEM
    LEFT JOIN bodegas ON bodegas.CVE_BODEGA= tiene.CVE_BODEGA
");
header('Content-Type: application/json');
$items=[];

while($fila=$consulta->fetch_assoc()){
    $items[]=$fila;
}
echo json_encode($items);

} else {
    header("location: ../../index.html");
}
?>