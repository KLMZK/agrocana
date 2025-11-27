<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$sql = "SELECT CVE_USUARIO, NOMBRE FROM usuarios";
$result = $conexion->query($sql);

$trabajadores = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $trabajadores[] = $row;
    }
}
echo json_encode($trabajadores);

} else {
    header("location: ../../index.html");
}
?>

