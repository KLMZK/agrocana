<?php
include "../../conexion/conexion.php";

if(isset($_POST['nombre'])){

    $nombre= $_POST ['nombre'];
    $insumo= $_POST ['insumo'];
    $telefono= $_POST ['telefono'];
    $correo= $_POST ['fecha'];
    $notas= $_POST ['notas'];

    $insertarDatos="INSERT INTO compradores VALUES('','$nombre','$telefono','$correo','$insumo','$notas')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

    mysqli_query($conexion, $insertman);

            echo "<script>
                alert('Proveedor guardado exitosamente');
                window.location.href = '../../PersonalyProveedores-Proveedores.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>