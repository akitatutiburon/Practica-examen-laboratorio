<?php
include '../conexion.php';

if(isset($_GET['id'])){

    $variable = $_GET['id'];
    $eliminar = "DELETE FROM mascotas WHERE id_mascota = $variable";

    // Para evitar eliminar
    //exit();

    // Error que impedía eliminar registro por que existe una tabla que tiene como atributo de un registro esta id de mascota
    $error_de_eliminacion_mascotas = "Cannot delete or update a parent row: a foreign key constraint fails (`tienda_mascotas`.`adopciones`, CONSTRAINT `adopciones_ibfk_2` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`))"; 
    if ($conn->query($eliminar) === TRUE) {
        echo 'Registro eliminado exitosamente';
    } elseif($conn->error == $error_de_eliminacion_mascotas) {
        echo 'No se puede eliminar la mascota. Existe un registro de adopciones de esta mascota ';

    } else {
        echo 'Error al eliminar el registro: ' . $conn->error;
    }    
} else {
    echo "No recibe la id necesaria";
}
include '../cerrar_conexion.php';
?>
<a class='boton_regresar' href='pag_principal.php'></br>Entendido</a>