<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

include "../conexion/conexion.php";

$mostrar = $_GET['desc'];

if($mostrar == 0){
    $sql = "SELECT COUNT(CVE_CULTIVOS) FROM cultivos";
}


} else {
    header("location: ../index.html");
}
?>