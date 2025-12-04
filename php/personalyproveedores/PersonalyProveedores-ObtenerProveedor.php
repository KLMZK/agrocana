<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$id = $conexion->real_escape_string($_GET["id"]);

$sql = "
SELECT 
    compradores.CVE_COMPRADOR as id,
    compradores.NOMBRE,
    compradores.TIPO AS INSUMO,
    compradores.TELEFONO,
    compradores.CORREO,
    compradores.NOTAS
FROM compradores WHERE CVE_COMPRADOR ='$id'
";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo json_encode($resultado->fetch_assoc());
} else {
    echo json_encode(["error" => "Proveedor no encontrado"]);
}

} else {
    header("location: ../../index.html");
}
?>
