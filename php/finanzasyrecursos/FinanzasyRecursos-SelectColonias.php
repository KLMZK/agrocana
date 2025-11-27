<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$ciudad = $_GET['ciudad'];

$stmt = $conexion->prepare("SELECT CVE_COLONIA, NOMBRE FROM colonias WHERE CVE_MUNICIPIO = ?");
$stmt->bind_param("i", $ciudad);
$stmt->execute();
$result = $stmt->get_result();

$colonias = [];

while ($row = $result->fetch_assoc()) {
    $colonias[] = $row;
}

echo json_encode($colonias, JSON_UNESCAPED_UNICODE);

} else {
    header("location: ../../index.html");
}
?>