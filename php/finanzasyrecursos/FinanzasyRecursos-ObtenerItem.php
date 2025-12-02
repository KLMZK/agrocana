<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$id = $conexion->real_escape_string($_GET["id"]);

$sql = "
SELECT 
    items.CVE_ITEM as id,
    items.NOMBRE,
    items.CATEGORIA,
    items.CANTIDAD,
    items.UNIDAD,
    items.PRECIOU AS COSTO,
    items.CVE_COMPRADOR AS PROVEEDOR,
    tiene.CVE_BODEGA AS BODEGA,
    items.ESTADO
FROM items 
LEFT JOIN tiene ON tiene.CVE_ITEM = items.CVE_ITEM
WHERE items.CVE_ITEM ='$id'
";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo json_encode($resultado->fetch_assoc());
} else {
    echo json_encode(["error" => "Item no encontrado"]);
}

} else {
    header("location: ../../index.html");
}
?>
