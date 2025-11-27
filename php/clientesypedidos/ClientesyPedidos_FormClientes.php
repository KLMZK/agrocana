<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

    include "../../conexion/conexion.php";

    if(isset($_POST['nombre'])){

        $nombre= $_POST ['nombre'];
        $telefono= $_POST ['telefono'];
        $correo= $_POST ['correo'];
        $observacion = $_POST ['observaciones']??'';

        $insertarDatos="INSERT INTO compradores VALUES('','$nombre','$telefono','$correo','Cliente','$observacion')";

        $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

                echo "<script>
                    alert('Cliente guardado exitosamente');
                    window.location.href = '../../ClientesyPedidos-GestionClientes.html';
                </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
    }
} else {
    header("location: ../../index.html");
}
?>