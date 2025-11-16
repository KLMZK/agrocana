<?php
include "conexion/conexion.php";

if(isset($_POST['trabajador'])){

    $trabajador= $_POST ['trabajador'];
    $placa= $_POST ['placa'];
    $fechaMan= $_POST ['fechaMan'];
    $costo= $_POST ['costo'];
    $observaciones= $_POST ['observaciones'];

    $insertarDatos="INSERT INTO mantenimientos VALUES('','$trabajador','$placa','$fechaMan','$costo','$observaciones')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

    mysqli_query($conexion, $insertman);

            echo "<script>
                alert('Mantenimiento registrado exitosamente');
                window.location.href = 'FinanzasyRecursos-Transporte.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>