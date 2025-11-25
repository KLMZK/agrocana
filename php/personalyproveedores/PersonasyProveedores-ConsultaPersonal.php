<?php
include "../../conexion/conexion.php";

$consulta = $conexion->query("
    SELECT 
        NOMBRE,
        TIPO,
        ROL,
        NUMEROTELEFONICO,
        CASE 
            WHEN ACTIVO = 1 THEN 'Activo'
            ELSE 'Inactivo'
        END AS ESTADO
    FROM usuarios
");

$usuarios=[];

while($fila=$consulta->fetch_assoc()){
    $usuarios[]=$fila;
}
echo json_encode($usuarios);
?>