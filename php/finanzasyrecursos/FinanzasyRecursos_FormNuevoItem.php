<?php
include "../../conexion/conexion.php";

if(isset($_POST['Nomitem'])){

    $Nomitem= $_POST ['Nomitem'];
    $categoria= $_POST ['categoria'];
    $cantidad= $_POST ['cantidad'];
    $unidad= $_POST ['unidad'];
    $costo= $_POST ['costo'];
    $proveedor= $_POST ['proveedor'];
    $ubicacion= $_POST ['ubicacion'];

    $insertarDatos="INSERT INTO items VALUES('','$proveedor','$nombre','$categoria','$cantidad','$unidad','Disponible','$costo')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

            echo "<script>
                alert('Ítem guardado exitosamente');
                window.location.href = '../../FinanzasyRecursos-Inventario.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>