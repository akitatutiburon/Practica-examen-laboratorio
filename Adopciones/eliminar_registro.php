<?php
include '../conexion.php';

if(isset($_GET['id'])){
    
    $variable = $_GET['id'];
    //echo $variable;

    // Construir la consulta SQL para eliminar el registro
    $eliminar = "DELETE FROM adopciones WHERE id_adopciones = $variable";

    // Para evitar eliminar
    //exit();

    // Error que impedía eliminar registro por que existe una tabla que tiene como atributo de un registro esta id de mascota
    $error_de_eliminacion_adopcion = "Cannot delete or update a parent row: a foreign key constraint fails (`tienda_mascotas`.`adopciones`, CONSTRAINT `adopciones_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`))"; 
    // Ejecutar la consulta
    if ($conn->query($eliminar) === TRUE) {
        echo 'Registro eliminado exitosamente';
    } elseif($conn->error == $error_de_eliminacion_mascotas) {
        echo 'No se puede eliminar el cliente. Existe un registro de adopciones de este cliente';

    } else {
        echo 'Error al eliminar el registro: ' . $conn->error;
    }    
} else {
    echo "No recibe la id necesaria";
}
include '../cerrar_conexion.php';
?>
<a class='boton_regresar' href='adopciones.php'>Entendido</a>