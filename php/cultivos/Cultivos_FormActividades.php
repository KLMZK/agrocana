<?php
include "../../conexion/conexion.php";

if(isset($_POST['actividad'])){

    $actividad= $_POST ['actividad'];
    $responsable= $_POST ['responsable'];
    $fecha= $_POST ['fecha'];
    $insumo= $_POST ['insumo'];
    $cinsumo= $_POST ['cinsumo'];
    $costo= $_POST ['costo'];
    $ccultivo= $_POST ['ccultivo'];
    $observaciones= $_POST ['observaciones'];

    $insertarDatos="INSERT INTO actividades VALUES('','$responsable','$ccultivo','$fecha','$observaciones','$actividad','$costo')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);
    
    $idActividad = mysqli_insert_id($conexion);
    $insertInsumoActividad = "INSERT INTO utiliza VALUES ('$idActividad', '$insumo', '$cinsumo')";

    mysqli_query($conexion, $insertInsumoActividad);

            echo "<script>
                alert('Actividad guardada exitosamente');
                window.location.href = '../../Cultivos-ActividadesAgricolas.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>