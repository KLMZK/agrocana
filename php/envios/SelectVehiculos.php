<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$sql = "SELECT PLACA FROM vehiculos WHERE ESTADO = 'Desocupado'";
$result = $conexion->query($sql);

$vehiculos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $vehiculos[] = $row;
    }
}
echo json_encode($vehiculos);

} else {
    header("location: ../../index.html");
}
?>