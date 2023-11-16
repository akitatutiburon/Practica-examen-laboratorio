<?php
include 'conexion.php';

// Consulta SQL para obtener los registros de la tabla "mascotas"
$sql = "SELECT id_mascota, nombre FROM mascotas";
$result = $conn->query($sql);


$opciones_mascotas = array();
// Verificar si se encontraron registros
if ($result->num_rows > 0) {
    // Recorrer los registros y almacenarlos
    while ($row = $result->fetch_assoc()) {
        $idMascota = $row["id_mascota"];
        $nombreMascota = $row["nombre"];
        array_push($opciones_mascotas, $row);


        // Aquí puedes realizar cualquier operación adicional con los datos

        // Ejemplo: Imprimir los datos
        //echo "ID Mascota: " . $idMascota . ", Nombre: " . $nombreMascota . "<br>";
    }
    
} else {
    echo "No se encontraron registros de mascotas.";
}
//print_r($opciones_mascotas);

// $get_nombres_id_cliente = "SELECT * FROM mascotas WHERE id_estado_legal_adopcion = $row[estado_legal_adopcion]";
// $resultado = mysqli_query($conn, $get_nombres_id_cliente);
// $fila = mysqli_fetch_assoc($resultado);
// echo $fila['nombre_estado_legal_adopcion'];

print_r($opciones_mascotas[4]['nombre']);

$opcion1 = "cosa1";
$opcion2 = "Opción 2";
$opcion3 = "pepe 3";

$opciones = array();
//print_r($opciones);
array_push($opciones, $opcion1, $opcion2, $opcion3);
//print_r($opciones);
$cantidad_opciones = count($opciones_mascotas);
//echo $cantidad_opciones;

?>

<form method="POST" action="prueba3.php">
  <label for="opcion">Selecciona una opción:</label>
  <select name="opcion" id="opcion">
    <?php
    
    // Generar opciones
    for ($i = 0; $i < $cantidad_opciones; $i++) {
      $variable = $opciones_mascotas[$i]['nombre'];
      echo "<option value=\"$variable\">$variable</option>";
    }
    ?>
  </select>
  <input type="submit" value="Enviar">
</form>
