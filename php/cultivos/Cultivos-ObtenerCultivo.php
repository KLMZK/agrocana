<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$id = $conexion->real_escape_string($_GET["id"]);

$sql = "
SELECT 
    c.CVE_CULTIVO,
    c.FECHASIEMBRA,
    c.FECHACOSECHA,
    c.OBSERVACIONES,
    c.ESTADO,
    c.CVE_TERRENO,
    t.NOMBRE,
    t.HECTAREAS
FROM cultivos c
INNER JOIN terrenos t ON c.CVE_TERRENO = t.CVE_TERRENO
WHERE c.CVE_CULTIVO = '$id'
";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo json_encode($resultado->fetch_assoc());
} else {
    echo json_encode(["error" => "Cultivo no encontrado"]);
}

} else {
    header("location: ../../index.html");
}
?>
