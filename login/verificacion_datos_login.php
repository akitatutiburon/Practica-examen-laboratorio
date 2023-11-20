<?php
include '../conexion.php';
session_start();

$email = $_POST['usuario'];
$password = $_POST['contrasena'];

    
$sql = "SELECT * FROM usuarios WHERE correo_electronico = '$email' AND contrasenia = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
// Variable inncesaria, solo es para entender mejor
$value_rol_usuario = $row['rol_usuario'];

unset($_SESSION['rol_usuario']);
$_SESSION['rol_usuario'] = $value_rol_usuario;

$value_id_usuario = $row['id_usuario'];
unset($_SESSION['id_usuario']);
$_SESSION['id_usuario'] = $value_id_usuario;


if (!$result) {
    die;
}elseif (mysqli_num_rows($result) == 1) {
    $urlDestino = '../Mascotas/pag_principal.php';
    header('Location: ' . $urlDestino);
} else {
    echo "no funciona, datos incorrectos";
}

?>