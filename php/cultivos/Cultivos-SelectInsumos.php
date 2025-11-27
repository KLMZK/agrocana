<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
    
include "../../conexion/conexion.php";

$sql = "SELECT CVE_ITEM, NOMBRE FROM items WHERE CATEGORIA != 'Vendibles'";
$result = $conexion->query($sql);

$items = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}
echo json_encode($items);

} else {
    header("location: ../../index.html");
}
?>

