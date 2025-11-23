<?php
include "../../conexion/conexion.php";

$consulta = $conexion->query("
    SELECT 
        actividades.CVE_ACTIVIDAD AS CVE_ACTIVIDAD,
        actividades.FECHA AS FECHA,
        actividades.TIPO AS TIPO,
        actividades.ESTADO AS ESTADO,
        IFNULL(items.NOMBRE, 'Sin insumos') AS INSUMO,
        usuarios.NOMBRE AS RESPONSABLE
    FROM actividades
    LEFT JOIN utiliza
        ON actividades.CVE_ACTIVIDAD = utiliza.CVE_ACTIVIDAD
    LEFT JOIN usuarios
        ON actividades.CVE_RESPONSABLE = usuarios.CVE_USUARIO
    LEFT JOIN items
        ON utiliza.CVE_ITEM = items.CVE_ITEM
");
header('Content-Type: application/json');
$actividades=[];

while($fila=$consulta->fetch_assoc()){
    $actividades[]=$fila;
}
echo json_encode($actividades);
?>