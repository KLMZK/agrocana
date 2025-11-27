<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

if(isset($_POST['Nomitem'])){

    $Nomitem= $_POST ['Nomitem'];
    $categoria= $_POST ['categoria'];
    $cantidad= $_POST ['cantidad'];
    $unidad= $_POST ['unidad'];
    $costo= $_POST ['costo'];
    $proveedor= $_POST ['proveedor'];
    $ubicacion= $_POST ['ubicacion'];

    $selectitem="SELECT NOMBRE FROM items WHERE NOMBRE = '$Nomitem'";
    $resultado = mysqli_query($conexion,$selectitem);

    if(mysqli_num_rows($resultado) != 0){
        echo "<script>
                alert('El item ya existe, intente con otro');
                window.location.href = '../../FinanzasyRecursos-Inventario.html';
              </script>";
        exit();
    }

    $insertarDatos="INSERT INTO items VALUES('','$proveedor','$Nomitem','$categoria','$cantidad','$unidad','Disponible','$costo')";
    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

     $iditem= mysqli_insert_id($conexion);
    $insertarDatos2="INSERT INTO tiene VALUES('$ubicacion','$iditem')";
    $ejecutarInsertar2=mysqli_query ($conexion, $insertarDatos2);

    $insertarDatos="INSERT INTO pedidos VALUES('','$proveedor','0', NOW())";

            $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

            $idPedido = mysqli_insert_id($conexion);
            $insertEncarga = "INSERT INTO encarga VALUES ('$idPedido','$iditem', '$cantidad')";

            mysqli_query($conexion, $insertEncarga);

            echo "<script>
                alert('Ítem guardado exitosamente');
                window.location.href = '../../FinanzasyRecursos-Inventario.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}

} else {
    header("location: ../../index.html");
}
?>