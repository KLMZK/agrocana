<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['id'] !== ''){
   
include "../../conexion/conexion.php";
header('Content-Type: application/json');

$tTrabajadores = $conexion->query("SELECT COUNT(*) as total FROM usuarios")->fetch_assoc()['total'] ?? 0;
$tPermanentes = $conexion->query("SELECT COUNT(*) AS total FROM usuarios WHERE ROL='Permanente'")->fetch_assoc()['total'] ?? 0;
$tTemporales = $conexion->query("SELECT COUNT(*) AS total FROM usuarios WHERE ROL='Temporal'")->fetch_assoc()['total'] ?? 0;
$tActivos = $conexion->query("SELECT COUNT(*) as total FROM usuarios WHERE ACTIVO=1")->fetch_assoc()['total'] ?? 0;

echo json_encode([
    "tTrabajadores" => $tTrabajadores,
    "tPermanentes" => $tPermanentes,
    "tTemporales" => $tTemporales,
    "tActivos" => $tActivos
]);

} else {
    header("location: ../../index.html");
}
?>