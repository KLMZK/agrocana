<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

if(isset($_POST['nombre'])){

    $nombre= $_POST ['nombre'];
    $insumo= $_POST ['insumo'];
    $telefono= $_POST ['telefono'];
    $correo= $_POST ['correo'];
    $notas= $_POST ['notas'];

    $selectemail="SELECT CORREO FROM compradores WHERE CORREO = '$correo' AND TIPO != 'CLIENTE'";
    $resultado = mysqli_query($conexion,$selectemail);

    if(mysqli_num_rows($resultado) != 0){
        echo "<script>
                alert('El correo ya existe, intente con otro');
                window.location.href = '../../PersonalyProveedores-Proveedores.html';
              </script>";
        exit();
    }

    $insertarDatos="INSERT INTO compradores VALUES('','$nombre','$telefono','$correo','$insumo','$notas')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

            echo "<script>
                alert('Proveedor guardado exitosamente');
                window.location.href = '../../PersonalyProveedores-Proveedores.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}

} else {
    header("location: ../../index.html");
}
?>