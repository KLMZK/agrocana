<?php
include "../../conexion/conexion.php";

$consulta = $conexion->query("
SELECT 
    compradores.NOMBRE,
    compradores.TIPO,
    compradores.TELEFONO,
    IFNULL(pedidos.FECHAPEDIDO,'S/F') AS FECHA
FROM compradores
LEFT JOIN pedidos 
    ON pedidos.CVE_COMPRADOR = compradores.CVE_COMPRADOR
    AND pedidos.INGRESO = 0
WHERE compradores.TIPO IS NOT NULL;
");

$proveedores=[];

while($fila=$consulta->fetch_assoc()){
    $proveedores[]=$fila;
}
echo json_encode($proveedores);
?>