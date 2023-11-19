<?php
include '../conexion.php';

// Paso 4: Procesa los datos editados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Recibir datos de formulario de datos cambiados (cambiar_datos_registro.php)
  $id_registro = $_POST["id_producto"];
  $campo1 = $_POST["campo1"];
  $campo2 = $_POST["campo2"];
  $campo3 = $_POST["campo3"];
  $campo4 = $_POST["campo4"];
  $campo5 = $_POST["campo5"];

  //Petición de update a Base de Datos
  $sql = "UPDATE productos SET nombre_producto = '$campo1', 
  descripcion_producto = '$campo2', 
  imagen = '$campo3', 
  id_categoria = '$campo4', 
  cantidad = '$campo5' WHERE id_producto = $id_registro";
  //echo $sql;
  //mysqli_query($conn, $sql);
  
  // Ejecutar la consulta SQL
  if (mysqli_query($conn, $sql)) {
    echo "Registro ingresado correctamente";
  } else {
    echo "Error al ingresar el registro: " . mysqli_error($conn);
  }
}

include '../cerrar_conexion.php';
?>
<a class='boton_regresar' href='pag_principal.php'></br>Entendido</a>