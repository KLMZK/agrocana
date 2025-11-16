<?php
include "conexion/conexion.php";

if(isset($_POST['vehiculo'])){

    $vehiculo= $_POST ['vehiculo'];
    $modelo= $_POST ['modelo'];
    $placa= $_POST ['placa'];
    $fecha= $_POST ['fecha'];
    $costo= $_POST ['costo'];
    $observaciones= $_POST ['observaciones'];

    $insertarDatos="INSERT INTO vehiculos VALUES('$placa','$modelo','$vehiculo','$observaciones','$fecha')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

    mysqli_query($conexion, $insertman);

            echo "<script>
                alert('Vehículo guardado exitosamente');
                window.location.href = 'FinanzasyRecursos-Transporte.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>