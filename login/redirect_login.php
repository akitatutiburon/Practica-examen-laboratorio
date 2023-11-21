<?php
include "../conexion.php";

if(!isset($_SESSION['rol_usuario']) or !isset($_SESSION['id_usuario'])){
} else {
    $urlDestino = '../login/pag_login.php';
    header('Location: ' . $urlDestino);
}

?>