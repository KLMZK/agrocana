<?php
include "../../conexion/conexion.php";

$sql = "SELECT cultivos.CVE_TERRENO, terrenos.NOMBRE 
FROM cultivos INNER JOIN terrenos 
ON cultivos.CVE_TERRENO = terrenos.CVE_TERRENO";

$result = $conexion->query($sql);

$items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}
echo json_encode($items);
?>

