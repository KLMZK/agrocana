<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$sql = "SELECT CVE_BODEGA, NOMBRE FROM bodegas";
$result = $conexion->query($sql);

$bodegas = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $bodegas[] = $row;
    }
}
echo json_encode($bodegas);

} else {
    header("location: ../../index.html");
}
?>

