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
    $Env=$resultado->fetch_assoc();
    $nombreArchivo = $Env['NOMBRE'] . $Env['APELLIDO_P'] . $Env['APELLIDO_M'] . ".jpg";
        $ruta = __DIR__ . "/../../perfil/" . $nombreArchivo;
        if (file_exists($ruta)) {
            $Env['FOTO'] = $nombreArchivo;
        } else {
            $Env['FOTO'] = "";
        }
    echo json_encode($Env);
} else {
    echo json_encode(["error" => "Trabajador no encontrado"]);
}

} else {
    header("location: ../../index.html");
}
?>
