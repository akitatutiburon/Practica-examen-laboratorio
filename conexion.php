<?php

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

<<<<<<< HEAD

=======
>>>>>>> 9db4f65491084c316a450b3c83d1de89a06939f5
?>