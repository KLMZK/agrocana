<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

    include "../../conexion/conexion.php";

    $cve = $_GET['cve'] ?? '';

    if($cve == ''){

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

        if(isset($_POST['nombre'])){

            $nombre= $_POST ['nombre'];
            $telefono= $_POST ['telefono'];
            $correo= $_POST ['correo'];
            $observacion = $_POST ['observaciones']??'';

            $actualizarDatos="UPDATE compradores SET NOMBRE='$nombre', TELEFONO='$telefono', CORREO='$correo', NOTAS='$observacion' WHERE CVE_COMPRADOR='$cve'";

            $ejecutarActualizar=mysqli_query ($conexion, $actualizarDatos);

                    echo "<script>
                        alert('Cliente actualizado exitosamente');
                        window.location.href = '../../ClientesyPedidos-GestionClientes.html';
                    </script>";

        } else {
            echo "Error: " . mysqli_error($conexion);
        }
    }
} else {
    header("location: ../../index.html");
}
?>