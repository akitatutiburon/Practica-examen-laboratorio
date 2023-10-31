<?php

$variable = $_GET['variable'];

echo $variable;


// Obtener el ID del registro a eliminar desde el formulario
$id_registro = $_GET['id_mascota'];

echo $id_registro;

// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_mascotas";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}




// Construir la consulta SQL para eliminar el registro
echo $eliminar = "DELETE FROM mascotas WHERE id_mascota = $id_registro";

exit();

//$confirmar_eliminar = $conn->query($eliminar);

// Ejecutar la consulta
if ($conn->query($eliminar) === TRUE) {
    echo 'Registro eliminado exitosamente';
} else {
    echo 'Error al eliminar el registro: ' . $conn->error;
}    


// Cerrar la conexión con la base de datos
$conn->close();
?>