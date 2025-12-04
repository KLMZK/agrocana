<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

if(isset($_POST['pedido'])){

    $pedido= $_POST ['pedido'];
    $vehiculo= $_POST ['vehiculo'];
    $conductor= $_POST ['conductor'];
    $origen_colonia=$_POST ['origen-colonia'];
    $origen_calle= $_POST ['origen-calle'];
    $destino_colonia=$_POST ['destino-colonia'];
    $destino_calle= $_POST ['destino-calle'];
    $salida = $_POST ['salida'];
    $llegada = $_POST ['llegada'];
    $observaciones = $_POST ['observaciones'];
    $costo = $_POST ['costo'];
    $cve = $_GET['cve']??'null';

    if($cve == 'null'){
        $insertarDatos="INSERT INTO envios VALUES('','$vehiculo','$conductor','$origen_colonia','$destino_colonia','$pedido','$origen_calle','$destino_calle','$salida','$llegada','$observaciones','$costo','0')";

        $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

        $actualizarconductor="UPDATE usuarios SET ACTIVO = 0 WHERE CVE_USUARIO = '$conductor'";
        mysqli_query($conexion, $actualizarconductor);

        $actualizarvehiculo="UPDATE vehiculos SET ESTADO = 'Ocupado' WHERE PLACA = '$vehiculo'";
        mysqli_query($conexion, $actualizarconductor);

        echo "<script>
                alert('Envio guardado exitosamente');
                window.location.href = '../../EnviosyLogistica.html';
            </script>";
    } else {
        $actualizar = "UPDATE envios SET `PLACA`='$vehiculo',`CVE_CONDUCTOR`='$conductor',`COLONIAORIGEN`='$origen_colonia',`COLONIADESTINO`='$destino_colonia',`CVE_PEDIDO`='$pedido',`ORIGEN`='$origen_calle',`DESTINO`='$destino_calle',`FECHASALIDA`='$salida',`FECHALLEGADA`='$llegada',`OBSERVACIONES`='$observaciones',`COSTO`='$costo' WHERE CVE_ENVIO = $cve";
        mysqli_query($conexion, $actualizar);

        echo "<script>
                alert('Envio actualizado correctamente');
                window.location.href = '../../EnviosyLogistica.html';
            </script>";
    }
    } else {
            echo "Error: " . mysqli_error($conexion);
            }
} else {
    header("location: ../../index.html");
}
?>