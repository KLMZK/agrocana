<?php
include "../../conexion/conexion.php";

$sql = "SELECT CVE_USUARIO, NOMBRE, APELLIDO_P, APELLIDO_M FROM usuarios WHERE TIPO = 'Conductor' AND ACTIVO = '1'";
$result = $conexion->query($sql);

$conductores = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $conductores[] = $row;
    }
}
echo json_encode($conductores);
?>

