<?php
include '../conexion.php';


// Obtener los valores enviados desde el formulario
$id_producto = $_POST['id_producto'];
$nombre_producto = $_POST['nombre_producto'];
$descripcion_producto = $_POST['descripcion_producto'];
$imagen = $_POST['imagen'];
$categoria = $_POST['id_categoria'];
$cantidad = $_POST['cantidad'];

// Crear la consulta SQL para insertar el registro en la tabla
$sql = "INSERT INTO  productos (`id_producto`, `nombre_producto`, `descripcion_producto`, `imagen`, `id_categoria`, `cantidad`) VALUES ('$id_producto', '$nombre_producto', '$descripcion_producto', '$imagen', '$categoria', '$cantidad')";
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