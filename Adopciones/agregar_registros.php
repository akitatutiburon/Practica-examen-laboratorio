<?php
include '../conexion.php';


// Obtener los valores enviados desde el formulario
$id_adopciones = $_POST['id_adopciones'];
$id_mascota = $_POST['id_mascota'];
$id_cliente = $_POST['id_cliente'];
$fecha = $_POST['fecha'];
$estado_legal_adopcion = $_POST['estado_legal_adopcion'];

// Verificar si lo rellenado en el formulario existe, primero voy a probar hacer un selector de opciones con registros existentes

// // Valor del id_mascota a verificar
// $id_mascota = 'valor_id_mascota';

// // Consulta SQL utilizando EXISTS
// $sql = "SELECT *
//         FROM mascotas
//         WHERE EXISTS (
//             SELECT 1
//             FROM mascotas
//             WHERE id_mascota = '$id_mascota'
//         )";

// $result = $conn->query($sql);

// // Verificar si se encontraron resultados
// if ($result->num_rows > 0) {
//     echo "El id_mascota existe en la tabla mascotas";
// } else {
//     echo "El id_mascota no existe en la tabla mascotas";
// }

// Crear la consulta SQL para insertar el registro en la tabla
$sql = "INSERT INTO  adopciones (`id_adopciones`, `id_mascota`, `id_cliente`, `fecha`, `estado_legal_adopcion`) VALUES ('$id_adopciones', '$id_mascota', '$id_cliente', '$fecha', '$estado_legal_adopcion')";
//echo $sql. " ";

// Ejecutar la consulta SQL
if (mysqli_query($conn, $sql)) {
    echo "Registro ingresado correctamente";
} else {
    echo "Error al ingresar el registro: " . mysqli_error($conn);
}


include '../cerrar_conexion.php';
?>
<a class='boton_regresar' href='adopciones.php'>Entendido</a>