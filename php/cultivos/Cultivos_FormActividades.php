<?php
include "../../conexion/conexion.php";

if(isset($_POST['actividad'])){

    $actividad= $_POST ['actividad'];
    $responsable= $_POST ['responsable'];
    $fecha= $_POST ['fecha'];
    $insumos= $_POST ['insumos'];
    $cinsumo= $_POST ['cinsumo'];
    $costo= $_POST ['costo'];
    $ccultivo= $_POST ['ccultivo'];
    $observaciones= $_POST ['observaciones'];

    $insertarDatos="INSERT INTO actividades VALUES('','$responsable','$ccultivo','$fecha','$observaciones','$actividad','$costo','Pendiente')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);
    
    $idActividad = mysqli_insert_id($conexion);
    $insertInsumoActividad = "INSERT INTO utiliza VALUES ('$idActividad', '$insumos', '$cinsumo')";

    $result = $conexion->query("SELECT CANTIDAD FROM items WHERE CVE_ITEM = $insumos");
    $row = $result->fetch_assoc();
    if($row['CANTIDAD'] >= $cinsumo){
        $updateItems = "UPDATE items 
                        SET CANTIDAD = CANTIDAD - $cinsumo 
                        WHERE CVE_ITEM = $insumos";
        mysqli_query($conexion, $updateItems);
    } else {
        echo "<script>alert('No hay suficiente cantidad disponible para este insumo');</script>";
    }

    mysqli_query($conexion, $insertInsumoActividad);

            echo "<script>
                alert('Actividad guardada exitosamente');
                window.location.href = '../../Cultivos-ActividadesAgricolas.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>