<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$nombreO= $conexion->real_escape_string($_POST["nombreO"]);
$apellidomO= $conexion->real_escape_string($_POST["apellidomO"]);
$apellidopO= $conexion->real_escape_string($_POST["apellidopO"]);
$nombre= $conexion->real_escape_string($_POST["nombre"]);
$apellidop= $conexion->real_escape_string($_POST["apellidop"]);
$apellidom= $conexion->real_escape_string($_POST["apellidom"]);
$tipo= $conexion->real_escape_string($_POST["tipo"]);
$rol= $conexion->real_escape_string($_POST["rol"]);
$telefono= $conexion->real_escape_string($_POST["telefono"]);
$usuario= $conexion->real_escape_string($_POST["usuario"]);
$password= $conexion->real_escape_string($_POST["password"]);
$id= $conexion->real_escape_string($_POST["id"]);
$perfil= $_FILES['perfil'];

        $nombreArchivo = $nombre . $apellidop . $apellidom . '.jpg';
        $dirPerfil = __DIR__ . '/../../perfil/';
        if (!is_dir($dirPerfil)) mkdir($dirPerfil, 0755, true);
        $ruta_final = $dirPerfil . $nombreArchivo;
        if ($perfil && isset($perfil['tmp_name']) && is_uploaded_file($perfil['tmp_name'])) {
            if (!move_uploaded_file($perfil['tmp_name'], $ruta_final)) {
                echo "<script>alert('Error al subir la imagen'); window.history.back();</script>";
                exit();
            }
        }
        if($nombreO!=$nombre||$apellidopO!=$apellidop||$apellidomO!=$apellidom){
            $nombreArchivoO = $nombreO . $apellidopO . $apellidomO . '.jpg';
            $rutaImg = $dirPerfil . $nombreArchivoO;
            if (file_exists($rutaImg)) {
                unlink($rutaImg);
            }
        }
    


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
