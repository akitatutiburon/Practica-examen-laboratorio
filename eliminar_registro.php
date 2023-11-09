<?php
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
    //echo $variable;

    // Construir la consulta SQL para eliminar el registro
    $eliminar = "DELETE FROM mascotas WHERE id_mascota = $variable";

    // Para evitar eliminar
    //exit();

    // Error que impedía eliminar registro por que existe una tabla que tiene como atributo de un registro esta id de mascota
    $error_de_eliminacion_mascotas = "Cannot delete or update a parent row: a foreign key constraint fails (`tienda_mascotas`.`adopciones`, CONSTRAINT `adopciones_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`))"; 
    // Ejecutar la consulta
    if ($conn->query($eliminar) === TRUE) {
        echo 'Registro eliminado exitosamente';
    } elseif($conn->error == $error_de_eliminacion_mascotas) {
        echo 'No se puede eliminar la mascota. Existe un registro de adopciones de esta mascota ';
        //$sql = "SELECT FROM adopciones WHERE id_mascota = $variable";
        //$result = $conn->query($sql);
        //echo $result;
        //echo $sql;

    } else {
        echo 'Error al eliminar el registro: ' . $conn->error;
    }    
} else {
    echo "No recibe la id necesaria";
}
include 'cerrar_conexion.php';
?>