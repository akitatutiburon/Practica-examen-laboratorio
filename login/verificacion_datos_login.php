<?php
include '../conexion.php';

$email = $_POST['usuario'];
$password = $_POST['contrasena'];



$sql = "SELECT * FROM usuarios WHERE correo_electronico = '$email' AND contrasenia = '$password'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$value = $row['id_usuario'];
//echo $value;


if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 1) {
    //echo "funciona";

    //header("Location: http://localhost/laboratorio_3ro/practica%20examen%20final/Practica-examen-laboratorio/login/redireccionar_segun_rol.php");
    $urlDestino = 'redireccionar_segun_rol.php?variable=' . $value;

    header('Location: ' . $urlDestino);

    // Los datos son correctos, el usuario ha iniciado sesión exitosamente
    // Puedes redirigir al usuario a otra página o mostrar un mensaje de éxito
} else {
    echo "no funciona, datos incorrectos";
    

    // Los datos son incorrectos, el usuario no ha podido iniciar sesión
    // Puedes mostrar un mensaje de error o redirigir al usuario a la página de inicio de sesión nuevamente
}

include '../cerrar_conexion.php'
?>