<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

if(isset($_POST['NomUbi'])){

    $NomUbi= $_POST ['NomUbi'];
    $direccion= $_POST ['direccion'];
    $colonia= $_POST ['colonia'];

    $selectubi="SELECT NOMBRE FROM bodegas WHERE NOMBRE = '$NomUbi'";
    $resultado = mysqli_query($conexion,$selectubi);

    if(mysqli_num_rows($resultado) != 0){
        echo "<script>
                alert('La bodega ya existe, intente con otra');
                window.location.href = '../../FinanzasyRecursos-Inventario.html';
              </script>";
        exit();
    }

    $insertarDatos="INSERT INTO bodegas VALUES('','$colonia','$NomUbi','$direccion')";
    $res = mysqli_query($conexion, $insertarDatos);

            echo "<script>
                alert('Ubicación guardada exitosamente');
                window.location.href = '../../FinanzasyRecursos-Inventario.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}

} else {
    header("location: ../../index.html");
}
?>