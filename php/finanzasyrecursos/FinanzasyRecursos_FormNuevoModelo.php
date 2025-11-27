<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

if(isset($_POST['marca'])){

    $marca= $_POST ['marca'];
    $modelo= $_POST ['modelo'];

    $sql = "SELECT CVE_MODELO, NOMBRE FROM modelos WHERE NOMBRE = '$modelo' AND CVE_MARCA = '$marca'";
    $result = $conexion->query($sql);

    if(mysqli_num_rows($result) != 0){
        echo "<script>
                alert('El modelo ya existe, intente con otro');
                window.location.href = '../../FinanzasyRecursos-FormularioRegistrarVehiculos.html';
              </script>";
        exit();
    }

    $insertarModelo="INSERT INTO modelos VALUES ('','$marca','$modelo')";
    mysqli_query($conexion, $insertarModelo);

            echo "<script>
                alert('Modelo guardado exitosamente');
                window.location.href = '../../FinanzasyRecursos-FormularioRegistrarVehiculos.html';
              </script>";

} else {
        echo "Error: " . mysqli_error($conexion);
        }

} else {
    header("location: ../../index.html");
}
?>