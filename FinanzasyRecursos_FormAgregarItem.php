<?php
include "conexion/conexion.php";

if(isset($_POST['nombreitem'])){

    $nombreitem= $_POST ['nombreitem'];
    $cantidad= $_POST ['cantidad'];

    $actualizarDatos="UPDATE items SET CANTIDAD = '$cantidad' WHERE CVE_ITEM ='$nombreitem'";

    $ejecutarInsertar=mysqli_query ($conexion, $actualizarDatos);

            echo "<script>
                alert('Ítem guardado exitosamente');
                window.location.href = 'FinanzasyRecursos-Inventario.html';
              </script>";

} else {
        echo "Error: " . mysqli_error($conexion);
        }
?>