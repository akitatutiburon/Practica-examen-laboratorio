<?php

// --- INUTIL POR AHORA ---(Preguntor a David)

include '../conexion.php';

$variable = $_GET['variable'];
echo $variable; 


// Obtener el valor del atributo "rol_usuario" del registro de "id_usuario" en la tabla "usuarios"
$sql = "SELECT rol_usuario FROM usuarios WHERE correo_electronico = $variable";
$result = $conn->query($sql);
echo $sql;


if ($result->num_rows > 0) {
    // Obtener el valor del atributo "rol_usuario"
    $row = $result->fetch_assoc();
    $rol_usuario = $row["rol_usuario"];
    echo $rol_usuario;

    // Verificar si el valor es igual a 1
    if ($rol_usuario == 1) {
        // Redireccionar a la URL específica
        header("Location: http://localhost/laboratorio_3ro/practica%20examen%20final/Practica-examen-laboratorio/Mascotas/pag_principal.php");
        exit;
    } elseif ($rol_usuario == 2) {
        // Redireccionar a la URL específica
        header("Location: http://localhost/laboratorio_3ro/practica%20examen%20final/Practica-examen-laboratorio/Mascotas/pag_vendedor.php");
        exit;
    }
} else {
    echo "No se encontró el registro en la tabla usuarios.";
}

include '../cerrar_conexion.php';
?>