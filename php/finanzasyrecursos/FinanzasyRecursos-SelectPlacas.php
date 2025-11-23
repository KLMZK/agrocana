<?php
include "../../conexion/conexion.php";

$sql = "SELECT PLACA FROM vehiculos";
$result = $conexion->query($sql);

$placas = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $placas[] = $row;
    }
}
echo json_encode($placas);
?>

