<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$cve = $_GET['cve']??'null';

if($cve === 'null'){
    $sql = "SELECT CVE_USUARIO, NOMBRE, APELLIDO_P, APELLIDO_M FROM usuarios WHERE TIPO = 'Conductor' AND ACTIVO = '1'";
} else {
    $sql = "SELECT CVE_USUARIO, NOMBRE, APELLIDO_P, APELLIDO_M FROM usuarios WHERE TIPO = 'Conductor'";
}
$result = $conexion->query($sql);

$conductores = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $conductores[] = $row;
    }
}
echo json_encode($conductores);

} else {
    header("location: ../../index.html");
}
?>

