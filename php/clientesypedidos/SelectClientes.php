<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

    include "../../conexion/conexion.php";

    $cve = $_GET['cve']??'null';
    $todos = $_GET['todos']??'null';

    if($cve == 'null'){

        if($todos == 'null') {
            $sql = "SELECT * FROM compradores WHERE TIPO = 'Cliente'";
        } else {
            
            $comprador = "SELECT INGRESO FROM pedidos WHERE CVE_PEDIDO = '$todos'";
            
            $ingreso="SELECT INGRESO FROM pedidos WHERE CVE_PEDIDO = '$todos'";
            $result = $conexion -> query($ingreso);

            $row = $result->fetch_assoc();
            $ingreso = $row['INGRESO'];
            
            if($ingreso === '0' || $ingreso === 0){
                $sql = "SELECT * FROM compradores WHERE TIPO != 'Cliente'";
            } else {
                $sql = "SELECT * FROM compradores WHERE TIPO = 'Cliente'";
            }
        } 
    } else {

        $sql = "SELECT * FROM compradores WHERE TIPO = 'Cliente' AND CVE_COMPRADOR = $cve";

    }

    $result = $conexion->query($sql);

    $clientes = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }
    }
    echo json_encode($clientes);

} else {
    header("location: ../../index.html");
}
?>