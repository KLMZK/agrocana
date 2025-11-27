<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

if(isset($_POST['item'])){

    $item= $_POST ['item'];
    $cantidad= $_POST ['cantidad'];

    $actualizarDatos="UPDATE items SET CANTIDAD = (CANTIDAD + '$cantidad') WHERE CVE_ITEM ='$item'";

    $ejecutarInsertar=mysqli_query ($conexion, $actualizarDatos);

    $consultaritem= "SELECT CVE_COMPRADOR, CATEGORIA FROM items WHERE CVE_ITEM = '$item'";
    $resultado = mysqli_query($conexion, $consultaritem);

    $proveedorId = null;
    $categoria = null;
    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $proveedorId = $fila['CVE_COMPRADOR'];
        $categoria = $fila['CATEGORIA'];
    }

    if($categoria!="Vendibles"){
    $insertarDatos="INSERT INTO pedidos VALUES('','$proveedorId','0', NOW())";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

    $idPedido = mysqli_insert_id($conexion);
    $insertEncarga = "INSERT INTO encarga VALUES ('$idPedido','$item', '$cantidad')";

            mysqli_query($conexion, $insertEncarga);
    }

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