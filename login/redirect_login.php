<?php
include "../conexion.php";

if(!isset($_SESSION['rol_usuario']) && !isset($_SESSION['id_usuario'])){
} else {
    $urlDestino = 'http://localhost/Practica-examen-laboratorio/login/pag_login.php';
    header('Location: ' . $urlDestino);
}

?>