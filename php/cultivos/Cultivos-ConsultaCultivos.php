<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$consulta = $conexion->query("
    SELECT 
        cultivos.CVE_CULTIVO,
        cultivos.FECHASIEMBRA,
        cultivos.FECHACOSECHA,
        cultivos.ESTADO,
        cultivos.OBSERVACIONES,
        cultivos.CVE_TERRENO,
        terrenos.HECTAREAS,
        terrenos.NOMBRE
    FROM cultivos
    INNER JOIN terrenos
    ON cultivos.CVE_TERRENO = terrenos.CVE_TERRENO
");

$cultivos=[];

while($fila=$consulta->fetch_assoc()){
    $cultivos[]=$fila;
}
echo json_encode($cultivos);

} else {
    header("location: ../../index.html");
}
?>