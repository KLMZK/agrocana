<?php
include "conexion/conexion.php";

if(isset($_POST['nombre'])){

    $nombre= $_POST ['nombre'];
    $telefono= $_POST ['telefono'];
    $correo= $_POST ['correo'];

    $insertarDatos="INSERT INTO compradores VALUES('','$nombre','$telefono','$correo','1','')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

    mysqli_query($conexion, $insertman);

            echo "<script>
                alert('Cliente guardado exitosamente');
                window.location.href = 'ClientesyPedidos-GestionClientes.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>