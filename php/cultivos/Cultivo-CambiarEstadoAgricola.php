<?php
include "../../conexion/conexion.php";

$id = $_POST['id'];

$sql = "UPDATE actividades SET ESTADO='Completada' WHERE CVE_ACTIVIDAD=$id";

if ($conexion->query($sql)) {
    echo "Estado actualizado correctamente";
} else {
    echo "Error al actualizar el estado";
}
?>
