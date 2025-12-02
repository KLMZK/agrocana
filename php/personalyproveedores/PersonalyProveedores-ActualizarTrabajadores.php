<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$data = json_decode(file_get_contents("php://input"), true);

$id = $conexion->real_escape_string($data["id"]);
$nombre = $conexion->real_escape_string($data["nombre"]);
$apellidop = $conexion->real_escape_string($data["apellidop"]);
$apellidom = $conexion->real_escape_string($data["apellidom"]);
$tipo = $conexion->real_escape_string($data["tipo"]);
$rol = $conexion->real_escape_string($data["rol"]);
$telefono = $conexion->real_escape_string($data["telefono"]);
$usuario = $conexion->real_escape_string($data["usuario"]);
$password = $conexion->real_escape_string($data["password"]);

$updatePersonal = "
UPDATE usuarios SET 
    NOMBRE='$nombre',
    APELLIDO_P='$apellidop',
    APELLIDO_M='$apellidom',
    TIPO='$tipo',
    NUMEROTELEFONICO='$telefono',
    USER='$usuario',
    PASSWORD='$password',
    ROL='$rol'
WHERE CVE_USUARIO='$id'
";

if ($conexion->query($updatePersonal)) {
    echo "OK";
} else {
    echo "Error: " . $conexion->error;
}

} else {
    header("location: ../../index.html");
}
?>
