<?php
include "../../conexion/conexion.php";

$placa = $_POST['placa'];

$sql = "SELECT ESTADO FROM vehiculos WHERE PLACA = '$placa'";
$result = $conexion->query($sql);

if($result && $result->num_rows > 0){
    $row = $result->fetch_assoc();
    $estadoActual = $row['ESTADO'];


    $nuevoEstado = ($estadoActual == 'Ocupado') ? 'Desocupado' : 'Ocupado';

    $update = "UPDATE vehiculos SET ESTADO = '$nuevoEstado' WHERE PLACA = '$placa'";
    if($conexion->query($update)){
        echo "Estado actualizado a '$nuevoEstado'";
    } else {
        echo "Error al actualizar el estado: " . $conexion->error;
    }

} else {
    echo "Registro no encontrado";
}
?>