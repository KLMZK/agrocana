<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

    include "../../conexion/conexion.php";

    $cve = $_POST['cve'];
    $sql = "DELETE FROM envios WHERE CVE_ENVIO = '$cve'";

    mysqli_query($conexion, $sql);

    echo "Envio eliminado correctamente.";

} else {
    header("location: ../../index.html");
}
?>