<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
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

    mysqli_begin_transaction($conexion);

    $buscultivo= mysqli_query($conexion,"SELECT CVE_CULTIVO FROM cultivos WHERE CVE_TERRENO=$ccultivo");
     if(!$buscultivo){
        mysqli_rollback($conexion);
        die("Error al consultar el cultivo.");
    }
    $CultivoE = mysqli_fetch_assoc($buscultivo);

    if(!$CultivoE){
        mysqli_rollback($conexion);
        die("No existe un cultivo asociado a ese terreno.");
    }
    $rcultivo = $CultivoE['CVE_CULTIVO'];

    $sqlActividad = "INSERT INTO actividades VALUES ('','$responsable','$rcultivo','$fecha','$observaciones','$actividad','$costo','Pendiente')";

    if(!mysqli_query($conexion, $sqlActividad)){
        mysqli_rollback($conexion);
        die("Error al insertar actividad: " . mysqli_error($conexion));
    }
    $idActividad = mysqli_insert_id($conexion);

    if($insumos == "0"){
        mysqli_commit($conexion);
        echo "<script>
                alert('Actividad guardada');
                window.location.href = '../../Cultivos-ActividadesAgricolas.html';
              </script>";
        exit;
    }

    $result = mysqli_query($conexion, "SELECT CANTIDAD FROM items WHERE CVE_ITEM = $insumos");
    if(!$result){
        mysqli_rollback($conexion);
        die("Error en consulta de inventario.");
    }
    $row = mysqli_fetch_assoc($result);

    if($row['CANTIDAD'] < $cinsumo){
        mysqli_rollback($conexion);
        echo "<script>alert('No hay suficiente inventario');
        window.location.href = '../../Cultivos-ActividadesAgricolas.html';</script>";
        exit;
    }

    $sqlUtiliza = "INSERT INTO utiliza VALUES ('$idActividad', '$insumos', '$cinsumo')";
    if(!mysqli_query($conexion, $sqlUtiliza)){
        mysqli_rollback($conexion);
        die("Error al insertar en utiliza.");
    }

    $sqlUpdate = "UPDATE items 
                  SET CANTIDAD = CANTIDAD - $cinsumo 
                  WHERE CVE_ITEM = $insumos";

    if(!mysqli_query($conexion, $sqlUpdate)){
        mysqli_rollback($conexion);
        die("Error al actualizar inventario.");
    }

    mysqli_commit($conexion);

    echo "<script>
            alert('Actividad guardada exitosamente');
            window.location.href = '../../Cultivos-ActividadesAgricolas.html';
          </script>";

}

} else {
    header("location: ../../index.html");
}
?>