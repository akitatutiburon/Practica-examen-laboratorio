<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../cesese.css">
    <title>Mascotas</title>
</head>
<body>

    <header>
        <h1>Lista de Mascotas</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../Mascotas/pag_principal.php">Mascotas</a></li>
            <li><a href="../Productos/pag_principal.php">Productos</a></li>
            <li><a href="../Adopciones/adopciones.php">Adopciones</a></li>
            <li><a href="../Clientes/clientes.php">Clientes</a></li>
            <li><a href="../Mi_cuenta/pag_principal.php">Mi cuenta</a></li>
        </ul>
    </nav>

<?php
include '../conexion.php';
include '../login/redirect_login.php';

session_start();
$rol_usuario = $_SESSION['rol_usuario'];
//print_r ($_SESSION);
$id_usuario = $_SESSION['id_usuario'];

//echo $id_usuario;

$sql = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    //print_r($row);
    $nombre_punto_apellido = $row['nombre_usuario'];
    //echo $nombre_punto_apellido;
    $nombre_y_apellido = explode(".", $nombre_punto_apellido);
    //print_r ($nombre_y_apellido);
    $nombre = ucfirst($nombre_y_apellido[0]);
    //$apellido = ucfirst($nombre_y_apellido[1]);

    $mensaje_bienvenida = "¡Hola, " . $nombre . "! Bienvenido/a a nuestro sistema.";
    $mensaje_cambiar_usuario = "¿No eres " . $nombre . "?. Accede con tu cuenta <a style='color: blue; text-decoration: underline blue;' href='../login/pag_login.php'>aquí</a>.";

    echo "<h2>". $mensaje_bienvenida . " " . $mensaje_cambiar_usuario . "</h2>"; 

    }
} else {
    echo "No se encontraron registros en la tabla.";
}



include '../cerrar_conexion.php';
?>
</body>
</html>