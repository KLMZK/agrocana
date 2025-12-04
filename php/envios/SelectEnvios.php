<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['id']) || $_SESSION['id'] === '') {
    header("location: ../../index.html");
    exit;
}

include "../../conexion/conexion.php";

$select = $_GET['seleccion'] ?? '0';
$cve = $_GET['cve'] ?? 'null';

if ($cve === 'null') {
    // empezar desde envios y usar LEFT JOIN para que el registro principal siempre aparezca
    $base = "FROM envios E
        LEFT JOIN pedidos P ON P.CVE_PEDIDO = E.CVE_PEDIDO
        LEFT JOIN encarga EN ON EN.CVE_PEDIDO = P.CVE_PEDIDO
        LEFT JOIN items I ON I.CVE_ITEM = EN.CVE_ITEM
        LEFT JOIN compradores C ON C.CVE_COMPRADOR = P.CVE_COMPRADOR
        LEFT JOIN vehiculos V ON V.PLACA = E.PLACA
        LEFT JOIN usuarios U ON U.CVE_USUARIO = E.CVE_CONDUCTOR
        LEFT JOIN colonias CO ON CO.CVE_COLONIA = E.COLONIAORIGEN
        LEFT JOIN colonias CD ON CD.CVE_COLONIA = E.COLONIADESTINO
        LEFT JOIN municipios MO ON MO.CVE_MUNICIPIO = CO.CVE_MUNICIPIO
        LEFT JOIN municipios MD ON MD.CVE_MUNICIPIO = CD.CVE_MUNICIPIO";

    $where = "";
    if ($select === '1') {
        $where = "WHERE E.ENTREGADO = '0'";
    } elseif ($select === '2') {
        $where = "WHERE E.ENTREGADO = '1'";
    }

    // agrupar para evitar una fila por cada item; concatenar items si existen
    $sql = "SELECT
        E.CVE_ENVIO AS NENVIO,
        E.ENTREGADO AS ENTREGADO,
        COALESCE(C.NOMBRE,'') AS CLIENTE,
        COALESCE(GROUP_CONCAT(DISTINCT CONCAT(IFNULL(I.NOMBRE,'[sin item]'), ' x', IFNULL(EN.CANTIDAD,0), ' ', IFNULL(I.UNIDAD,'')) SEPARATOR ' | '),'') AS ITEMS,
        COALESCE(V.TIPO,'') AS VEHICULO,
        COALESCE(V.PLACA,'') AS PLACA,
        COALESCE(CONCAT(U.NOMBRE,' ',U.APELLIDO_P,' ',U.APELLIDO_M),'') AS CONDUCTOR,
        COALESCE(MO.NOMBRE,'') AS MORIGEN,
        COALESCE(CO.NOMBRE,'') AS CORIGEN,
        E.ORIGEN AS CALLEORIGEN,
        COALESCE(MD.NOMBRE,'') AS MDESTINO,
        COALESCE(CD.NOMBRE,'') AS CDESTINO,
        E.DESTINO AS CALLEDESTINO,
        E.FECHASALIDA AS FECHASALIDA,
        E.FECHALLEGADA AS FECHALLEGADA,
        E.COSTO AS COSTO,
        E.OBSERVACIONES AS NOTA
        $base
        $where
        GROUP BY E.CVE_ENVIO
        ORDER BY E.FECHASALIDA DESC";

} else {
    // consulta detallada para un envio específico: usar LEFT JOIN para tolerar relaciones faltantes
    $cveInt = (int)$cve;
    $sql = "SELECT
        E.CVE_ENVIO AS NENVIO,
        E.PLACA AS PLACA,
        E.CVE_CONDUCTOR AS CVE_CONDUCTOR,
        E.COSTO AS COSTO,
        C1.CP AS CPO,
        C2.CP AS CPD,
        E.COLONIAORIGEN AS CO,
        E.COLONIADESTINO AS CD,
        E.ORIGEN AS ORIGEN,
        E.DESTINO AS DESTINO,
        E.FECHASALIDA AS FECHASALIDA,
        E.FECHALLEGADA AS FECHALLEGADA,
        E.OBSERVACIONES AS OBSERVACIONES
        FROM envios AS E
        LEFT JOIN colonias AS C1 ON E.COLONIAORIGEN = C1.CVE_COLONIA
        LEFT JOIN colonias AS C2 ON E.COLONIADESTINO = C2.CVE_COLONIA
        WHERE E.CVE_ENVIO = '$cveInt' LIMIT 1";
}

$result = $conexion->query($sql);

$envios = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $envios[] = $row;
    }
}

// normalizar campo ENTREGADO
foreach ($envios as &$fila) {
    if (!isset($fila['ENTREGADO']) || $fila['ENTREGADO'] === null || $fila['ENTREGADO'] == 0) {
        $fila['ENTREGADO'] = 'En transito';
    } else {
        $fila['ENTREGADO'] = 'Entregado';
    }
}
unset($fila);

echo json_encode($envios, JSON_UNESCAPED_UNICODE);
?>
