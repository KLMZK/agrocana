<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

if(isset($_POST['nombre'])){

    $nombre= $_POST ['nombre'];
    $apellidop= $_POST ['apellidop'];
    $apellidom= $_POST ['apellidom'];
    $tipo= $_POST ['tipo'];
    $rol= $_POST ['rol'];
    $telefono= $_POST ['telefono'];
    $usuario= $_POST ['usuario'];
    $contraseña= $_POST ['contraseña'];
    $perfil= $_FILES['perfil'];

    $selectuser="SELECT USER FROM usuarios WHERE USER = '$usuario'";
    $resultado = mysqli_query($conexion,$selectuser);

    if(mysqli_num_rows($resultado) != 0){
        echo "<script>
                alert('El usuario ya existe, intente con otro');
                window.location.href = '../../PersonalyProveedores-Trabajadores.html';
              </script>";
        exit();
    }

    $perfil = $_FILES['perfil'];
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

    $insertarDatos="INSERT INTO usuarios VALUES('','$nombre','$apellidop','$apellidom','$tipo','$telefono','$usuario','$contraseña','$rol','1')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

            echo "<script>
                alert('Trabajador guardado exitosamente');
                window.location.href = '../../PersonalyProveedores-Trabajadores.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}

} else {
    header("location: ../../index.html");
}
?>