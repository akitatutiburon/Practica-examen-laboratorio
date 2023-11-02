<!-- <!DOCTYPE html>
<html>
<head>
  <title>Formulario de Afirmación</title>
</head>
<body>
  <h1>Formulario de Afirmación 2 </h1>

  <form method="POST" action="eliminar_registro.php">

    <label for="respuesta">¿Está seguro que desea eliminar el dato seleccionado?</label>
    <input type="submit" name="respuesta" value="Sí">
    <input type="submit" name="respuesta" value="No">

  </form>




</body>
</html> -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    #$afirmacion = $_POST["afirmacion"];
    $respuesta = $_POST["respuesta"];
    $true = "Sí";
    $false = "No";
    if($respuesta == $true){
        echo "respuesta afirmativa";


        
    } else {
        echo "respuesta negativa";
    }
    echo "Respuesta: " . $respuesta;
}
include 'conexion.php';
// // Comprueba si la variable está definida y no es nula
// $idEsperado = 1;

// if (isset($_GET['id'])) {
//     // Obtén el valor de la variable ID
//     $id = $_GET['id'];

//     // Compara el valor de la variable con el valor ID esperado
//     if ($id == $idEsperado) {
//         // La variable tiene el valor ID esperado
//         echo "La variable tiene el valor ID esperado. ";
//     } else {
//         // La variable no tiene el valor ID esperado
//         echo "La variable no tiene el valor ID esperado. ";
//     }
// } else {
//     // La variable no está definida o es nula
//     echo "La variable no está definida o es nula. ";
// }
if(isset($_GET['id'])){
    
    $variable = $_GET['id'];
    echo $variable;

    // Construir la consulta SQL para eliminar el registro
    $eliminar = "DELETE FROM mascotas WHERE id_mascota = $variable";

    // Para evitar eliminar
    exit();

    // Ejecutar la consulta
    if ($conn->query($eliminar) === TRUE) {
        echo 'Registro eliminado exitosamente';
    } else {
        echo 'Error al eliminar el registro: ' . $conn->error;
    }    
} else {
    echo "no funca :(";
}
include 'cerrar_conexion.php';
?>