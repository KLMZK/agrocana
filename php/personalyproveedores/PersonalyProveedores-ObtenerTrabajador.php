<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";

$id = $conexion->real_escape_string($_GET["id"]);

$sql = "
SELECT 
    CVE_USUARIO AS id,
    usuarios.NOMBRE,
    usuarios.APELLIDO_P,
    usuarios.APELLIDO_M,
    usuarios.TIPO,
    usuarios.NUMEROTELEFONICO,
    usuarios.USER,
    usuarios.PASSWORD,
    usuarios.ROL
FROM usuarios WHERE CVE_USUARIO ='$id'
";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo json_encode($resultado->fetch_assoc());
} else {
    echo json_encode(["error" => "Trabajador no encontrado"]);
}

} else {
    header("location: ../../index.html");
}
?>
