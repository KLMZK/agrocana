<?php

include "../conexion/conexion.php";

$mostrar = $_GET['desc'];

if($mostrar == 0){
    $sql = "SELECT COUNT(CVE_CULTIVOS) FROM cultivos";
}

?>