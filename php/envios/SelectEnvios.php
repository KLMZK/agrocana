<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$select= $_GET['seleccion']??'0';
$cve = $_GET['cve']??'null';

if($cve=='null'){
    if($select == '0') {
        $sql = "SELECT 
                    E.CVE_ENVIO AS NENVIO,
                    MAX(E.ENTREGADO) AS ENTREGADO,
                    MAX(C.NOMBRE) AS CLIENTE,
                    GROUP_CONCAT(I.NOMBRE SEPARATOR ', ') AS ITEMS,
                    SUM(EN.CANTIDAD) AS TOTAL_CANTIDAD,
                    MAX(I.UNIDAD) AS UNIDAD,
                    MAX(MO.NOMBRE) AS MORIGEN,
                    MAX(CO.NOMBRE) AS CORIGEN,
                    MAX(E.ORIGEN) AS CALLEORIGEN,
                    MAX(V.TIPO) AS VEHICULO,
                    MAX(V.PLACA) AS PLACA,
                    CONCAT(MAX(U.NOMBRE),' ',MAX(U.APELLIDO_P),' ',MAX(U.APELLIDO_M)) AS CONDUCTOR,
                    MAX(MD.NOMBRE) AS MDESTINO,
                    MAX(CD.NOMBRE) AS CDESTINO,
                    MAX(E.DESTINO) AS CALLEDESTINO,
                    MAX(E.FECHASALIDA) AS FECHASALIDA,
                    MAX(E.FECHALLEGADA) AS FECHALLEGADA,
                    MAX(E.COSTO) AS COSTO,
                    MAX(E.OBSERVACIONES) AS NOTA
                FROM envios AS E
                LEFT JOIN vehiculos AS V ON V.PLACA = E.PLACA
                LEFT JOIN usuarios AS U ON E.CVE_CONDUCTOR = U.CVE_USUARIO
                LEFT JOIN colonias AS CO ON CO.CVE_COLONIA = E.COLONIAORIGEN
                LEFT JOIN colonias AS CD ON CD.CVE_COLONIA = E.COLONIADESTINO
                LEFT JOIN municipios AS MO ON MO.CVE_MUNICIPIO = CO.CVE_MUNICIPIO
                LEFT JOIN municipios AS MD ON MD.CVE_MUNICIPIO = CD.CVE_MUNICIPIO
                LEFT JOIN pedidos AS P ON E.CVE_PEDIDO = P.CVE_PEDIDO
                LEFT JOIN encarga AS EN ON EN.CVE_PEDIDO = P.CVE_PEDIDO
                LEFT JOIN items AS I ON I.CVE_ITEM = EN.CVE_ITEM
                LEFT JOIN compradores AS C ON C.CVE_COMPRADOR = P.CVE_COMPRADOR
                GROUP BY E.CVE_ENVIO;";
    } if($select == '1') {
        $sql = "SELECT 
                    E.CVE_ENVIO AS NENVIO,
                    MAX(E.ENTREGADO) AS ENTREGADO,
                    MAX(C.NOMBRE) AS CLIENTE,
                    GROUP_CONCAT(I.NOMBRE SEPARATOR ', ') AS ITEMS,
                    SUM(EN.CANTIDAD) AS TOTAL_CANTIDAD,
                    MAX(I.UNIDAD) AS UNIDAD,
                    MAX(MO.NOMBRE) AS MORIGEN,
                    MAX(CO.NOMBRE) AS CORIGEN,
                    MAX(E.ORIGEN) AS CALLEORIGEN,
                    MAX(V.TIPO) AS VEHICULO,
                    MAX(V.PLACA) AS PLACA,
                    CONCAT(MAX(U.NOMBRE),' ',MAX(U.APELLIDO_P),' ',MAX(U.APELLIDO_M)) AS CONDUCTOR,
                    MAX(MD.NOMBRE) AS MDESTINO,
                    MAX(CD.NOMBRE) AS CDESTINO,
                    MAX(E.DESTINO) AS CALLEDESTINO,
                    MAX(E.FECHASALIDA) AS FECHASALIDA,
                    MAX(E.FECHALLEGADA) AS FECHALLEGADA,
                    MAX(E.COSTO) AS COSTO,
                    MAX(E.OBSERVACIONES) AS NOTA
                FROM envios AS E
                LEFT JOIN vehiculos AS V ON V.PLACA = E.PLACA
                LEFT JOIN usuarios AS U ON E.CVE_CONDUCTOR = U.CVE_USUARIO
                LEFT JOIN colonias AS CO ON CO.CVE_COLONIA = E.COLONIAORIGEN
                LEFT JOIN colonias AS CD ON CD.CVE_COLONIA = E.COLONIADESTINO
                LEFT JOIN municipios AS MO ON MO.CVE_MUNICIPIO = CO.CVE_MUNICIPIO
                LEFT JOIN municipios AS MD ON MD.CVE_MUNICIPIO = CD.CVE_MUNICIPIO
                LEFT JOIN pedidos AS P ON E.CVE_PEDIDO = P.CVE_PEDIDO
                LEFT JOIN encarga AS EN ON EN.CVE_PEDIDO = P.CVE_PEDIDO
                LEFT JOIN items AS I ON I.CVE_ITEM = EN.CVE_ITEM
                LEFT JOIN compradores AS C ON C.CVE_COMPRADOR = P.CVE_COMPRADOR
                WHERE E.ENTREGADO = '0' GROUP BY E.CVE_ENVIO;";
        } if($select == '2') {
            $sql = "SELECT 
                    E.CVE_ENVIO AS NENVIO,
                    MAX(E.ENTREGADO) AS ENTREGADO,
                    MAX(C.NOMBRE) AS CLIENTE,
                    GROUP_CONCAT(I.NOMBRE SEPARATOR ', ') AS ITEMS,
                    SUM(EN.CANTIDAD) AS TOTAL_CANTIDAD,
                    MAX(I.UNIDAD) AS UNIDAD,
                    MAX(MO.NOMBRE) AS MORIGEN,
                    MAX(CO.NOMBRE) AS CORIGEN,
                    MAX(E.ORIGEN) AS CALLEORIGEN,
                    MAX(V.TIPO) AS VEHICULO,
                    MAX(V.PLACA) AS PLACA,
                    CONCAT(MAX(U.NOMBRE),' ',MAX(U.APELLIDO_P),' ',MAX(U.APELLIDO_M)) AS CONDUCTOR,
                    MAX(MD.NOMBRE) AS MDESTINO,
                    MAX(CD.NOMBRE) AS CDESTINO,
                    MAX(E.DESTINO) AS CALLEDESTINO,
                    MAX(E.FECHASALIDA) AS FECHASALIDA,
                    MAX(E.FECHALLEGADA) AS FECHALLEGADA,
                    MAX(E.COSTO) AS COSTO,
                    MAX(E.OBSERVACIONES) AS NOTA
                FROM envios AS E
                LEFT JOIN vehiculos AS V ON V.PLACA = E.PLACA
                LEFT JOIN usuarios AS U ON E.CVE_CONDUCTOR = U.CVE_USUARIO
                LEFT JOIN colonias AS CO ON CO.CVE_COLONIA = E.COLONIAORIGEN
                LEFT JOIN colonias AS CD ON CD.CVE_COLONIA = E.COLONIADESTINO
                LEFT JOIN municipios AS MO ON MO.CVE_MUNICIPIO = CO.CVE_MUNICIPIO
                LEFT JOIN municipios AS MD ON MD.CVE_MUNICIPIO = CD.CVE_MUNICIPIO
                LEFT JOIN pedidos AS P ON E.CVE_PEDIDO = P.CVE_PEDIDO
                LEFT JOIN encarga AS EN ON EN.CVE_PEDIDO = P.CVE_PEDIDO
                LEFT JOIN items AS I ON I.CVE_ITEM = EN.CVE_ITEM
                LEFT JOIN compradores AS C ON C.CVE_COMPRADOR = P.CVE_COMPRADOR
                WHERE E.ENTREGADO = '1' GROUP BY E.CVE_ENVIO";
    }
} else {
    $sql = "SELECT E.CVE_PEDIDO AS NPEDIDO, E.PLACA AS PLACA, E.CVE_CONDUCTOR AS CVE_CONDUCTOR, E.COSTO AS COSTO, C1.CP AS CPO, C2.CP AS CPD, E.COLONIAORIGEN AS CO, E.COLONIADESTINO AS CD, E.ORIGEN AS ORIGEN, E.DESTINO AS DESTINO, E.FECHASALIDA AS FECHASALIDA, E.FECHALLEGADA AS FECHALLEGADA, E.OBSERVACIONES AS OBSERVACIONES  FROM envios AS E LEFT JOIN colonias AS C1 ON E.COLONIAORIGEN = C1.CVE_COLONIA LEFT JOIN colonias AS C2 ON C2.CVE_COLONIA = E.COLONIADESTINO WHERE E.CVE_ENVIO = '$cve'";
}
    $result = $conexion->query($sql);

$envios = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $envios[] = $row;
    }
}

foreach ($envios as &$fila) {
    if (!isset($fila['ENTREGADO']) || $fila['ENTREGADO'] === null || $fila['ENTREGADO'] == 0) {
        $fila['ENTREGADO'] = 'En transito';
    } else {
        $fila['ENTREGADO'] = 'Entregado';
    }
}

echo json_encode($envios);

} else {
    header("location: ../../index.html");
}
?>
