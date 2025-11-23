<?php
include "../../conexion/conexion.php";

if(isset($_POST['lote'])){

    $lote= $_POST ['lote'];
    $fsiembra= $_POST ['fsiembra'];
    $fcosecha = date("Y-m-d", strtotime($fsiembra . " +15 months"));
    $hectareas= $_POST ['hectareas'];
    $observaciones= $_POST ['observaciones'];

    $insertarDatos="INSERT INTO terrenos VALUES('','$lote','$hectareas')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

    $idterreno = mysqli_insert_id($conexion);
    $insertCultivos = "INSERT INTO cultivos VALUES ('','$idterreno','$fsiembra','$fcosecha','En crecimiento','$observaciones')";

    mysqli_query($conexion, $insertCultivos);
    

            echo "<script>
                alert('Cultivo guardado exitosamente');
                window.location.href = '../../Cultivos-CultivosRegistrados.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>