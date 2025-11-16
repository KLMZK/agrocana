<?php
include "conexion/conexion.php";

if(isset($_POST['NomUbi'])){

    $NomUbi= $_POST ['NomUbi'];
    $direccion= $_POST ['direccion'];
    $colonia= $_POST ['colonia'];

    $insertarDatos="INSERT INTO bodegas VALUES('','$colonia','$NomUbi','$direccion')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

            echo "<script>
                alert('Ubicación guardada exitosamente');
                window.location.href = 'FinanzasyRecursos-Inventario.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>