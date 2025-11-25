<?php
include "../../conexion/conexion.php";

$sql = "SELECT CVE_CIUDAD, NOMBRE FROM ciudades";
$result = $conexion->query($sql);

$ciudades = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ciudades[] = $row;
    }
}
echo json_encode($ciudades, JSON_UNESCAPED_UNICODE);
?>

