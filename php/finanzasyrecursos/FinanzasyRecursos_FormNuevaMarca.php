<?php
include "../../conexion/conexion.php";

if(isset($_POST['marca'])){

    $marca= $_POST ['marca'];

    $agregarMarca="INSERT INTO marcas VALUES ('','$marca')";

    $ejecutarInsertar=mysqli_query ($conexion, $agregarMarca);

            echo "<script>
                alert('Marca guardada exitosamente');
                window.location.href = '../../FinanzasyRecursos-FormularioRegistrarVehiculos.html';
              </script>";

} else {
        echo "Error: " . mysqli_error($conexion);
        }
?>