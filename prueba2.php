<?php
include 'conexion.php';

$sql3 = "SELECT id_estado_legal_adopcion, nombre_estado_legal_adopcion FROM tabla_estado_legal_adopcion";
$result3 = $conn->query($sql3);

$opciones_estado_legal_adopcion = array();
if ($result3->num_rows > 0) {
  while ($row3 = $result3->fetch_assoc()) {
    array_push($opciones_estado_legal_adopcion, $row3);
  }    
} else {
    echo "No se encontraron registros de Estados legales de adopción.";
}
$cantidad_opciones3 = count($opciones_estado_legal_adopcion);
?>

<form method="POST" action="prueba3.php">
  <label for="opcion">Selecciona una opción:</label>
  estado_legal_adopcion : <select name="id_estado_legal_adopcion" id="opcion">
    <?php
    for ($i = 0; $i < $cantidad_opciones3; $i++) {
      $variable3 = $opciones_estado_legal_adopcion[$i]['nombre_estado_legal_adopcion'];
      echo "<option value=\"$variable3\">$variable3</option>";
    }
    ?>
  <input type="submit" value="Enviar">
</form>
