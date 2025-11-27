<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

    include "../../conexion/conexion.php";

    $sql = "SELECT * FROM compradores WHERE TIPO = 'Cliente'";
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