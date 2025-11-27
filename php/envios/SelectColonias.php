<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$id = $_GET['id'];

$sql = "SELECT CVE_COLONIA, NOMBRE FROM colonias WHERE CP = '$id'";
$result = $conexion->query($sql);

$colonias = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $colonias[] = $row;
    }
}
echo json_encode($colonias);

} else {
    header("location: ../../index.html");
}
?>

