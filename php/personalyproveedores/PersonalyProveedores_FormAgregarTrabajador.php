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