<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

include "../conexion/conexion.php";

$mostrar = $_GET['desc'];

if($mostrar == 0){
    $sql = "SELECT COUNT(CVE_TERRENO) AS TOTAL, SUM(HECTAREAS) AS HECTAREAS FROM terrenos";
}
if($mostrar == 1){
    $sql = "SELECT COUNT(CVE_CULTIVO) AS TOTAL FROM cultivos WHERE ESTADO = 'Listo para cosecha'";
}
if($mostrar == 2){
    $sql = "SELECT COUNT(CVE_CULTIVO) AS TOTAL FROM cultivos WHERE ESTADO = 'En crecimiento'";
}
if($mostrar == 3){
    $sql = "SELECT MAX(FECHA) AS FECHA FROM actividades WHERE TIPO = 'Riego' AND ESTADO = 'Completada'";
}
if($mostrar == 4){
    $sql = "SELECT MAX(FECHA) AS FECHA FROM actividades WHERE TIPO = 'Riego' AND ESTADO = 'Pendiente'";
}
if($mostrar == 5){
    $sql = "SELECT A.TIPO AS TIPO, U.NOMBRE AS NOMBRE, APELLIDO_P AS APELLIDOP, APELLIDO_M AS APELLIDOM, A.FECHA AS FECHA, A.ESTADO AS ESTADO FROM actividades AS A JOIN usuarios AS U ON A.CVE_RESPONSABLE = U.CVE_USUARIO ORDER BY A.FECHA";
}
if($mostrar == 6){
    $sql = "SELECT C.NOMBRE AS CLIENTE, E.FECHASALIDA AS FECHASALIDA, E.ENTREGADO AS ENTREGADO, I.NOMBRE AS ITEM, EN.CANTIDAD AS CANTIDAD, I.UNIDAD AS UNIDAD FROM envios AS E JOIN pedidos AS P ON P.CVE_PEDIDO = E.CVE_PEDIDO JOIN compradores AS C ON C.CVE_COMPRADOR = P.CVE_COMPRADOR JOIN encarga AS EN ON P.CVE_PEDIDO = EN.CVE_PEDIDO JOIN items AS I ON EN.CVE_ITEM = I.CVE_ITEM ORDER BY E.FECHASALIDA";
}

$result = $conexion->query($sql);

$consulta = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $consulta[] = $row;
    }
}
echo json_encode($consulta);

} else {
    header("location: ../index.html");
}
?>