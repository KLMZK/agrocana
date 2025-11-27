<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$sql = "SELECT CVE_COMPRADOR, NOMBRE FROM compradores WHERE TIPO != 'Cliente'";
$result = $conexion->query($sql);

$usuarios = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}
echo json_encode($usuarios);

} else {
    header("location: ../../index.html");
}
?>

