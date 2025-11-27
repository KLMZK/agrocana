<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$consulta = $conexion->query("
SELECT
	compradores.CVE_COMPRADOR,
    compradores.NOMBRE,
    compradores.TIPO,
    compradores.TELEFONO,
    IFNULL(MAX(pedidos.FECHAPEDIDO),'S/F') AS FECHA
FROM compradores
LEFT JOIN pedidos 
    ON pedidos.CVE_COMPRADOR = compradores.CVE_COMPRADOR
    WHERE compradores.TIPO != 'Cliente'
    GROUP BY compradores.CVE_COMPRADOR;
");

$proveedores=[];

while($fila=$consulta->fetch_assoc()){
    $proveedores[]=$fila;
}
echo json_encode($proveedores);

} else {
    header("location: ../../index.html");
}
?>