<?php
include '../conexion.php';


// Obtener los valores enviados desde el formulario
$id_adopciones = $_POST['id_adopciones'];
$id_mascota = $_POST['id_mascota'];
$id_cliente = $_POST['id_cliente'];
$fecha = $_POST['fecha'];
$estado_legal_adopcion = $_POST['id_estado_legal_adopcion'];

// Crear la consulta SQL para insertar el registro en la tabla
$sql = "INSERT INTO  adopciones (`id_adopciones`, `id_mascota`, `id_cliente`, `fecha`, `estado_legal_adopcion`) VALUES ('$id_adopciones', '$id_mascota', '$id_cliente', '$fecha', '$estado_legal_adopcion')";

// Ejecutar la consulta SQL
if (mysqli_query($conn, $sql)) {
    echo "Registro ingresado correctamente";
} else {
    echo "\n Error al ingresar el registro: " . mysqli_error($conn);
}


include '../cerrar_conexion.php';
?>
<a class='boton_regresar' href='adopciones.php'>Entendido</a>