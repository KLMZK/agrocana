<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$id = $_POST['id'];

$sql = "SELECT ESTADO FROM items WHERE CVE_ITEM = '$id'";
$result = $conexion->query($sql);

if($result && $result->num_rows > 0){
    $row = $result->fetch_assoc();
    $estadoActual = $row['ESTADO'];


    $nuevoEstado = ($estadoActual == 'No Disponible') ? 'Disponible' : 'No Disponible';

    $update = "UPDATE items SET ESTADO = '$nuevoEstado' WHERE CVE_ITEM = '$id'";
    if($conexion->query($update)){
        echo "Estado actualizado a '$nuevoEstado'";
    } else {
        echo "Error al actualizar el estado: " . $conexion->error;
    }

} else {
    echo "Registro no encontrado";
}

} else {
    header("location: ../../index.html");
}
?>