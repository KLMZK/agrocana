<?php 
    session_start();

    $ses = (isset($_SESSION['id']) && $_SESSION['id'] !== '') ? 1 : 0;
    echo json_encode(["sesion" => $ses]);
?>