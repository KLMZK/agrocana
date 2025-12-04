<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$id = $conexion->real_escape_string($_POST['id']);

$sql="SELECT NOMBRE,APELLIDO_P,APELLIDO_M FROM usuarios WHERE CVE_USUARIO='$id'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $dato = $result->fetch_assoc();
    $nombre      = $dato['NOMBRE'];
    $apellidop   = $dato['APELLIDO_P'];
    $apellidom   = $dato['APELLIDO_M'];
}
$nombreArchivo = $nombre . $apellidop . $apellidom . '.jpg';
$dirPerfil = __DIR__ . '/../../perfil/';
$rutaImg = $dirPerfil . $nombreArchivo;
if (file_exists($rutaImg)) {
    unlink($rutaImg);
}

if($conexion->query("DELETE FROM usuarios WHERE CVE_USUARIO='$id'")){
    echo "Personal eliminado correctamente.";
} else {
    echo "Error: " . $conexion->error;
}

} else {
    header("location: ../../index.html");
}
?>