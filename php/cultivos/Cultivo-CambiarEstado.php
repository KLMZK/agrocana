<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$id = $_POST['id'];

$sql = "UPDATE cultivos SET ESTADO='Listo para cosecha' WHERE CVE_CULTIVO=$id";

if ($conexion->query($sql)) {
    echo "Estado actualizado correctamente";
} else {
    echo "Error al actualizar el estado";
}

} else {
    header("location: ../../index.html");
}
?>
