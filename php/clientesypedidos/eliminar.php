<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){

    include "../../conexion/conexion.php";

    $cve = $_POST['cve'];
    $des = $_GET['des'];

    if($des == '0'){
        
    }

    mysqli_query($conexion, $sql);

    echo "Cultivo eliminado correctamente.";

} else {
    header("location: ../../index.html");
}
?>