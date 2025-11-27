<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$sql = "SELECT CVE_ACTIVIDAD,TIPO 
FROM actividades";

$result = $conexion->query($sql);

$tipo = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tipo[] = $row;
    }
}
echo json_encode($tipo);

} else {
    header("location: ../../index.html");
}
?>

