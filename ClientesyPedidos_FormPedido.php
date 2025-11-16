<?php
include "conexion/conexion.php";

if(isset($_POST['cliente'])){

    $cliente= $_POST ['cliente'];
    $producto= $_POST ['producto'];
    $cantidad= $_POST ['cantidad'];
    $pedido= $_POST ['pedido'];
    $entrega= $_POST ['entrega'];

    $insertarDatos="INSERT INTO pedidos VALUES('','$cliente','$pedido','$entrega','1')";

    $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

    $idPedido = mysqli_insert_id($conexion);
    $insertEncarga = "INSERT INTO encarga VALUES ('$idPedido','$producto', '$cantidad')";

    mysqli_query($conexion, $insertEncarga);

    mysqli_query($conexion, $insertman);

            echo "<script>
                alert('Pedido guardado exitosamente');
                window.location.href = 'ClientesyPedidos-GestionClientes.html';
              </script>";

    } else {
        echo "Error: " . mysqli_error($conexion);
}
?>