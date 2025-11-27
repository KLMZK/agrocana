<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$sql = "SELECT CVE_MUNICIPIO, NOMBRE FROM municipios";
$result = $conexion->query($sql);

$ciudades = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $ciudades[] = $row;
    }
}
echo json_encode($ciudades, JSON_UNESCAPED_UNICODE);

} else {
    header("location: ../../index.html");
}
?>

