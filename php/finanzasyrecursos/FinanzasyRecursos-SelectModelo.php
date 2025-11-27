<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$marca = $_GET['marca'];

$sql = "SELECT CVE_MODELO, NOMBRE FROM modelos WHERE CVE_MARCA = '$marca'";
$result = $conexion->query($sql);

$modelos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $modelos[] = $row;
    }
}
echo json_encode($modelos);

} else {
    header("location: ../../index.html");
}
?>