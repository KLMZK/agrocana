<?php
include "../../conexion/conexion.php";

$id = $conexion->real_escape_string($_GET["id"]);

$sql = "
SELECT 
    actividades.CVE_RESPONSABLE,
    items.CVE_ITEM,
    terrenos.CVE_TERRENO,
    actividades.TIPO,
    actividades.FECHA,
    actividades.OBSERVACIONES,
    utiliza.CANTIDAD,
    actividades.COSTO
FROM actividades 
INNER JOIN cultivos  ON cultivos.CVE_CULTIVO = actividades.CVE_CULTIVO
INNER JOIN terrenos  ON cultivos.CVE_TERRENO = terrenos.CVE_TERRENO
INNER JOIN utiliza  ON utiliza.CVE_ACTIVIDAD = actividades.CVE_ACTIVIDAD
INNER JOIN items  ON items.CVE_ITEM = utiliza.CVE_ITEM
INNER JOIN usuarios  ON usuarios.CVE_USUARIO = actividades.CVE_RESPONSABLE
WHERE actividades.CVE_ACTIVIDAD = '$id'
";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo json_encode($resultado->fetch_assoc());
} else {
    echo json_encode(["error" => "Actividad no encontrada"]);
}
?>
