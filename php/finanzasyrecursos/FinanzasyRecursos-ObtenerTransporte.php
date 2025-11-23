<?php
include "../../conexion/conexion.php";

$placa = $conexion->real_escape_string($_GET["placa"]);

$sql = "
SELECT 
    vehiculos.PLACA,
    vehiculos.CVE_MODELO,
    modelos.NOMBRE AS MODELO,
    vehiculos.TIPO,
    vehiculos.OBSERVACIONES,
    vehiculos.FECHA,
    marcas.CVE_MARCA AS MARCA,
    vehiculos.ESTADO
FROM vehiculos 
LEFT JOIN modelos ON modelos.CVE_MODELO = vehiculos.CVE_MODELO
LEFT JOIN marcas ON marcas.CVE_MARCA = modelos.CVE_MARCA
WHERE vehiculos.PLACA ='$placa'
";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo json_encode($resultado->fetch_assoc());
} else {
    echo json_encode(["error" => "Vehiculo no encontrado"]);
}
?>
