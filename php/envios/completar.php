<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
  
    include "../../conexion/conexion.php";

    $cve = $_POST['cve'];

    $sql = "UPDATE envios SET ENTREGADO = '1', FECHALLEGADA = NOW() WHERE CVE_ENVIO = '$cve'";

    mysqli_query($conexion, $sql);

    $conductor = "SELECT CVE_CONDUCTOR FROM envios WHERE CVE_ENVIO = $cve";

    $resultado = mysqli_query($conexion, $conductor);

    $vehiculo = "SELECT PLACA FROM envios WHERE CVE_ENVIO = $cve";

    $resultado2 = mysqli_query($conexion, $vehiculo);

    $vehiculo = mysqli_fetch_array($resultado2)[0];

    $conductor = mysqli_fetch_array($resultado)[0];

    $activo = "UPDATE usuarios SET ACTIVO = 1 WHERE CVE_USUARIO = '$conductor'";

    $activo2 = "UPDATE vehiculos SET ESTADO = 'Desocupado'";

    mysqli_query($conexion,$activo);
    mysqli_query($conexion,$activo2);

    echo "Envio completado";

} else {
    header("location: ../../index.html");
}
?>