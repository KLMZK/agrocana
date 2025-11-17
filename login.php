<?php
session_start();

include "conexion/conexion.php";

$user = $_POST["user"];
$password = $_POST["password"];
$sql = "SELECT cve_usuario FROM usuarios WHERE user = '".$user."' AND password = '".$password."'";
$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) <= 0) {
    echo "<script>
        localStorage.setItem('ingreso','incorrecto');
        window.location.href = 'index.html';
    </script>";
} else {
    $_SESSION['id'] = mysqli_fetch_array($resultado)[0];
    header("location: menu.php");
    exit();
}

?>