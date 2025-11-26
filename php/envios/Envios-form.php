<?php
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

    $insertarDatos="INSERT INTO envios VALUES('','$vehiculo','$conductor','$origen_colonia','$destino_colonia','$pedido','$origen_calle','$destino_calle','$salida','$llegada','$observaciones','$costo','0')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

    $actualizarconductor="UPDATE usuarios SET ACTIVO = 0 WHERE CVE_USUARIO = '$conductor'";
    mysqli_query($conexion, $actualizarconductor);

    $actualizarvehiculo="UPDATE vehiculos SET ESTADO = 'Ocupado' WHERE PLACA = '$vehiculo'";
    mysqli_query($conexion, $actualizarconductor);

    echo "<script>
            alert('Actividad guardada exitosamente');
            window.location.href = '../../EnviosyLogistica.html';
        </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>