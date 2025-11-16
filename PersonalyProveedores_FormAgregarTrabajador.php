<?php
include "conexion/conexion.php";

if(isset($_POST['vehiculo'])){

    $nombre= $_POST ['nombre'];
    $apellidop= $_POST ['apellidop'];
    $apellidom= $_POST ['apellidom'];
    $tipo= $_POST ['tipo'];
    $rol= $_POST ['rol'];
    $telefono= $_POST ['telefono'];
    $usuario= $_POST ['usuario'];
    $contraseña= $_POST ['contraseña'];

    $insertarDatos="INSERT INTO compradores VALUES('','$nombre','$apellidop','$apellidom','$tipo','$telefono','$usuario','$contraseña','$rol','Activo')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

    mysqli_query($conexion, $insertman);

            echo "<script>
                alert('Trabajador guardado exitosamente');
                window.location.href = 'PersonalyProveedores-Trabajadores.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>