<?php
include '../conexion.php';

$value_id_usuario = "";

$email = $_POST['usuario'];
$password = $_POST['contrasena'];

    
$sql = "SELECT * FROM usuarios WHERE correo_electronico = '$email' AND contrasenia = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$value_id_usuario = $row['id_usuario'];
$value_id_usuario;

if (!$result) {
    die;//("Error en la consulta: " . mysqli_error($conn));
}elseif (mysqli_num_rows($result) == 1) {
    //echo "funciona";
    $urlDestino = '../prueba1.php?id_usuario=' . $value_id_usuario;
    header('Location: ' . $urlDestino);
} else {
    echo "no funciona, datos incorrectos";
}




echo $value_id_usuario;

//include '../cerrar_conexion.php'
?>