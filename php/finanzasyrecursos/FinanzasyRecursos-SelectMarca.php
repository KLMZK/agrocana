<?php
include "../../conexion/conexion.php";

$sql = "SELECT CVE_MARCA, NOMBRE FROM marcas";
$result = $conexion->query($sql);

$marcas = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $marcas[] = $row;
    }
}
echo json_encode($marcas);
?>

