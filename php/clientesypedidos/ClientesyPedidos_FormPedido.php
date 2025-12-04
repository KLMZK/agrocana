<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

    include "../../conexion/conexion.php";

    if(isset($_POST['cliente'])){

        $cve = $_GET['cve'] ?? 'null';

        $cliente= $_POST ['cliente'];
        $producto= $_POST ['producto'];
        $cantidad= $_POST ['cantidad'];
        $pedido= $_POST ['pedido'];

        if($cve == 'null'){

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
            $actual = "SELECT CANTIDAD FROM encarga WHERE CVE_PEDIDO = '$cve' AND CVE_ITEM = '$producto'";
            $result = $conexion -> query($actual);

            $row = $result->fetch_assoc();

            $cantidad_usada = (float)$row['CANTIDAD'] ?? 0;

            if($cantidad_usada == 0){
                $borrar = "DELETE FROM encarga WHERE CVE_PEDIDO = '$cve'";
                mysqli_query($conexion, $borrar);

                $insertEncarga = "INSERT INTO encarga VALUES ('$cve','$producto', '$cantidad')";
                mysqli_query($conexion, $insertEncarga);
            }

            $sql="SELECT CANTIDAD FROM items WHERE CVE_ITEM = '$producto'";
            $result = $conexion -> query($sql);
            
            $row = $result->fetch_assoc();
            $cantidad_actual = (float)$row["CANTIDAD"];

            $ingreso="SELECT INGRESO FROM pedidos WHERE CVE_PEDIDO = '$cve'";
            $result = $conexion -> query($ingreso);

            $row = $result->fetch_assoc();
            $ingreso = $row['INGRESO'];
            
            if($ingreso == 1){
                $total = $cantidad_actual-(float)$cantidad + $cantidad_usada;
            } else {
                $total = $cantidad_actual+(float)$cantidad - $cantidad_usada;
            }
            if($total < 0) {
                echo "<script>
                        alert('No existen suficientes existencias del producto');
                        window.location.href = '../../ClientesyPedidos-GestionClientes.html';
                    </script>";
            } else {

                $item = "UPDATE items SET CANTIDAD = '$total' WHERE CVE_ITEM = '$producto'";
                mysqli_query($conexion, $item);

                $encarga = "UPDATE encarga SET CANTIDAD = '$cantidad' WHERE CVE_PEDIDO = '$cve'";
                mysqli_query($conexion, $encarga);

                $pedido = "UPDATE pedidos SET CVE_COMPRADOR = '$cliente', FECHAPEDIDO = '$pedido' WHERE CVE_PEDIDO = '$cve'";
                mysqli_query($conexion, $pedido);

                        echo "<script>
                            alert('Pedido actualizado correctamente');
                            window.location.href = '../../ClientesyPedidos-GestionClientes.html';
                        </script>";
            }
        }
        } else {
            echo "Error: " . mysqli_error($conexion);
    }
} else {
    header("location: ../../index.html");
}
?>