<?php
// Quilombo para hacer un formulario que muestre los nombres de los registros de mascotas. Ya funciona xd
if (isset($_POST['id_estado_legal_adopcion'])) {
  $opcionSeleccionada = $_POST['id_estado_legal_adopcion'];

  // Procesar la opción seleccionada
  echo "Has seleccionado la opción: " . $opcionSeleccionada;
}
?>