<?php
include "../../conexion/conexion.php";


$id = $_POST['id'];
$fsiembra = $_POST['fsiembra'];
$observaciones = $_POST['observaciones'];

$sql = "SELECT CVE_TERRENO FROM cultivos WHERE CVE_CULTIVO = $id";
$res = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($res);
$terreno = $row["CVE_TERRENO"];

$fcosecha = date("Y-m-d", strtotime($fsiembra . " +15 months"));

$sqlIns = "INSERT INTO cultivos (CVE_TERRENO, FECHASIEMBRA, FECHACOSECHA, ESTADO, OBSERVACIONES)
           VALUES ('$terreno', '$fsiembra', '$fcosecha', 'En crecimiento', '$observaciones')";

if (mysqli_query($conexion, $sqlIns)) {
    echo "<script>alert('Replantado registrado correctamente.'); window.location.href='../../Cultivos-CultivosRegistrados.html';</script>";
} else {
    echo "Error: " . mysqli_error($conexion);
}
?>
