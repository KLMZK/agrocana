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

    $insertarModelo="INSERT INTO modelos VALUES ('','$marca','$modelo')";
    mysqli_query($conexion, $insertarModelo);

    $busquedaModelo="SELECT CVE_MODELO FROM modelos WHERE CVE_MARCA='$marca' AND NOMBRE='$modelo'";
    $result = mysqli_query($conexion, $busquedaModelo);
    $fila = mysqli_fetch_assoc($result);
    $cve_modelo = $fila['CVE_MODELO'];


    $insertarDatos="INSERT INTO vehiculos VALUES('$placa','$cve_modelo','$tipo','$observaciones','$fecha','Desocupado')";

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