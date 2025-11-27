<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

if(isset($_POST['tipo'])){

    $tipo= $_POST ['tipo'];
    $modelo= $_POST ['modelo'];
    $placa= $_POST ['placa'];
    $fecha= $_POST ['fecha'];
    $observaciones= $_POST ['observaciones'];
    $marca=$_POST['marca'];

    $selectplaca="SELECT PLACA FROM vehiculos WHERE PLACA = '$placa'";
    $resultado = mysqli_query($conexion,$selectplaca);

    if(mysqli_num_rows($resultado) != 0){
        echo "<script>
                alert('El vehiculo ya existe, intente con otro');
                window.location.href = '../../FinanzasyRecursos-Transporte.html';
              </script>";
        exit();
    }

    $insertarDatos="INSERT INTO vehiculos VALUES('$placa','$modelo','$tipo','$observaciones','$fecha','Desocupado')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

            echo "<script>
                alert('Vehículo guardado exitosamente');
                window.location.href = '../../FinanzasyRecursos-Transporte.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}

} else {
    header("location: ../../index.html");
}
?>