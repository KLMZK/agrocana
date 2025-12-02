<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$id = $_POST['id'];

$sql = "SELECT ACTIVO FROM usuarios WHERE CVE_USUARIO = '$id'";
$result = $conexion->query($sql);

if($result && $result->num_rows > 0){
    $row = $result->fetch_assoc();
    $estadoActual = $row['ACTIVO'];


    $nuevoEstado = ($estadoActual == 1) ? 0 : 1;
    if($nuevoEstado==1){
        $textEstado='Activo';
    }else{
        $textEstado='Inactivo';
    }

    $update = "UPDATE usuarios SET ACTIVO = '$nuevoEstado' WHERE CVE_USUARIO = '$id'";
    if($conexion->query($update)){
        echo "Estado actualizado a '$textEstado'";
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