<?php
include "../../conexion/conexion.php";

if(isset($_POST['trabajador'])){

    $trabajador= $_POST ['trabajador'];
    $placas= $_POST ['placas'];
    $fechaMan= $_POST ['fechaMan'];
    $costo= $_POST ['costo'];
    $observaciones= $_POST ['observaciones'];

    $insertarDatos="INSERT INTO mantenimientos VALUES('','$trabajador','$placas','$fechaMan','$costo','$observaciones')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

            echo "<script>
                alert('Mantenimiento registrado exitosamente');
                window.location.href = '../../FinanzasyRecursos-Transporte.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>