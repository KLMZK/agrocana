<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

    include "../../conexion/conexion.php";

    if(isset($_POST['cliente'])){

        $cliente= $_POST ['cliente'];
        $producto= $_POST ['producto'];
        $cantidad= $_POST ['cantidad'];
        $pedido= $_POST ['pedido'];

        $sql="SELECT CANTIDAD FROM items WHERE CVE_ITEM = '$producto'";
        $result = $conexion -> query($sql);
        
        $row = $result->fetch_assoc();
        $cantidad_actual = (float)$row["CANTIDAD"];

        $total = $cantidad_actual-(float)$cantidad;
        if($total < 0) {
            echo "<script>
                    alert('No existen suficientes existencias del producto');
                    window.location.href = '../../ClientesyPedidos-GestionClientes.html';
                </script>";
        } else {

            $insertarDatos="INSERT INTO pedidos VALUES('','$cliente','1','$pedido')";

            $ejecutarInsertar=mysqli_query ($conexion, $insertarDatos);

            $idPedido = mysqli_insert_id($conexion);
            $insertEncarga = "INSERT INTO encarga VALUES ('$idPedido','$producto', '$cantidad')";

            mysqli_query($conexion, $insertEncarga);

            $actualizarItem="UPDATE items SET CANTIDAD = '$total' WHERE CVE_ITEM='$producto'";
            mysqli_query($conexion, $actualizarItem);
            

                    echo "<script>
                        alert('Pedido guardado exitosamente');
                        window.location.href = '../../ClientesyPedidos-GestionClientes.html';
                    </script>";
        }
        } else {
            echo "Error: " . mysqli_error($conexion);
    }
} else {
    header("location: ../../index.html");
}
?>