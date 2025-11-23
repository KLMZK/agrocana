<?php
include "../../conexion/conexion.php";

if(isset($_POST['item'])){

    $item= $_POST ['item'];
    $cantidad= $_POST ['cantidad'];

    $actualizarDatos="UPDATE items SET CANTIDAD = (CANTIDAD + '$cantidad') WHERE CVE_ITEM ='$item'";

    $ejecutarInsertar=mysqli_query ($conexion, $actualizarDatos);

            echo "<script>
                alert('Ítem guardado exitosamente');
                window.location.href = '../../FinanzasyRecursos-Inventario.html';
              </script>";

} else {
        echo "Error: " . mysqli_error($conexion);
        }
?>