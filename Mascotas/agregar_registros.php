<?php
include '../conexion.php';


// Obtener los valores enviados desde el formulario
$id_mascota = $_POST['id_mascota'];
$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$imagen = $_POST['imagen'];
$descripcion = $_POST['descripcion'];
$estado_salud = $_POST['estado_salud'];
$estado_legal_mascota = $_POST['estado_legal_mascota'];
$precio = $_POST['precio'];

// Crear la consulta SQL para insertar el registro en la tabla
$sql = "INSERT INTO  mascotas (`id_mascota`, `nombre`, `especie`, `raza`, `edad`, `genero`, `imagen`, `descripcion`, `estado_salud`, `estado_legal_mascota`, `precio`) VALUES ('$id_mascota', '$nombre', '$especie', '$raza', '$edad', '$genero', '$imagen', '$descripcion', '$estado_salud', '$estado_legal_mascota', '$precio')";
//echo $sql. " ";

// Ejecutar la consulta SQL
if (mysqli_query($conn, $sql)) {
    echo "Registro ingresado correctamente";
} else {
    echo "Error al ingresar el registro: " . mysqli_error($conn);
}


include '../cerrar_conexion.php';
?>
<a class='boton_regresar' href='pag_principal.php'></br>Entendido</a>