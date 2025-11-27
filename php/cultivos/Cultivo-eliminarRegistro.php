<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";


$id = $conexion->real_escape_string($_POST['id']);

if($conexion->query("DELETE FROM cultivos WHERE CVE_CULTIVO='$id'")){
    echo "Cultivo eliminado correctamente.";
} else {
    echo "Error: " . $conexion->error;
}

} else {
    header("location: ../../index.html");
}
?>