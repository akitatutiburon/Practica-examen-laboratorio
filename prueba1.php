<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../cesese.css">
    <title>Mascotas</title>
</head>
<body>
    <!-- <h1>Lista de Mascotas</h1> -->

    <header>
        <h1>Lista de Mascotas</h1>
    </header>
    <nav>
        <ul>
            <li><a href="http://localhost/Practica-examen-laboratorio/Mascotas/pag_principal.php">Mascotas</a></li>
            <li><a href="http://localhost/Practica-examen-laboratorio/Productos/pag_principal.php">Productos</a></li>
            <li><a href="http://localhost/Practica-examen-laboratorio/Adopciones/adopciones.php">Adopciones</a></li>
            <li><a href="http://localhost/Practica-examen-laboratorio/Clientes/clientes.php">Clientes</a></li>
        </ul>
    </nav>

<?php
include '../conexion.php';
session_start();
$rol_usuario = $_SESSION['rol_usuario'];
$id_usuario = $_SESSION['id_usuario'];

echo $id_usuario;

$sql = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
$result = $conn->query($sql);



include '../cerrar_conexion.php';
?>
</body>
</html>