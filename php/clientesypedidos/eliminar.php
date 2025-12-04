<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

    include "../../conexion/conexion.php";

    $cve = $_POST['cve'];
    $des = $_GET['des'];

    if($des == '0'){
        $sql = "DELETE FROM compradores WHERE CVE_COMPRADOR = $cve";
    } else {
        $sql = "DELETE FROM pedidos WHERE CVE_PEDIDO = $cve";
    }

    mysqli_query($conexion, $sql);

    echo "Registro eliminado correctamente.";

} else {
    header("location: ../../index.html");
}
?>