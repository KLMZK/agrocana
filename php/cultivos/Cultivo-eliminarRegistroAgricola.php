<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";


$id = $conexion->real_escape_string($_POST['id']);
$borrar="DELETE FROM actividades WHERE CVE_ACTIVIDAD='$id'";
$borrar1="DELETE FROM utiliza WHERE CVE_ACTIVIDAD='$id'";

if($conexion->query($borrar)&&
$conexion->query($borrar)){
    echo "Cultivo eliminado correctamente.";
} else {
    echo "Error: " . $conexion->error;
}

} else {
    header("location: ../../index.html");
}
?>