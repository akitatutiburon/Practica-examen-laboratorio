<?php
include 'conexion.php';

// Paso 4: Procesa los datos editados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Recibir datos de formulario de datos cambiados (cambiar_datos_registro.php)
  $id_registro = $_POST["id_mascota"];
  $campo1 = $_POST["campo1"];
  $campo2 = $_POST["campo2"];
  $campo3 = $_POST["campo3"];
  $campo4 = $_POST["campo4"];
  $campo5 = $_POST["campo5"];
  $campo6 = $_POST["campo6"];
  $campo7 = $_POST["campo7"];
  $campo8 = $_POST["campo8"];
  $campo9 = $_POST["campo9"];
  $campo10 = $_POST["campo10"];

  //Petición de update a Base de Datos
  $sql = "UPDATE mascotas SET nombre = '$campo1', 
  precio = '$campo2', 
  especie = '$campo3', 
  raza = '$campo4', 
  edad = '$campo5', 
  genero = '$campo6', 
  imagen = '$campo7', 
  descripcion = '$campo8', 
  estado_salud = '$campo9', 
  estado_legal_mascota = '$campo10' WHERE id_mascota = $id_registro";
  echo $sql;
  //mysqli_query($conn, $sql);
  
  // Ejecutar la consulta SQL
  if (mysqli_query($conn, $sql)) {
    echo "Registro ingresado correctamente";
  } else {
    echo "Error al ingresar el registro: " . mysqli_error($conn);
  }
}

include 'cerrar_conexion.php';
?>