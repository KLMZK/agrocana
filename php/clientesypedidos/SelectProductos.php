<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$sql = "SELECT CVE_ITEM, NOMBRE FROM items WHERE CATEGORIA = 'Vendibles' AND CANTIDAD > '0'";
$result = $conexion -> query($sql);

$productos = [];
if($result->num_rows > 0) {
    while($row = $result ->fetch_assoc()){
        $productos[] = $row;
    }
}
echo json_encode($productos);

} else {
    header("location: ../../index.html");
}
?>