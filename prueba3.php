<?php
// Quilombo para hacer un formulario que muestre los nombres de los registros de mascotas. Ya funciona xd
if (isset($_POST['opcion'])) {
  $opcionSeleccionada = $_POST['opcion'];

  // Procesar la opción seleccionada
  echo "Has seleccionado la opción: " . $opcionSeleccionada;
}
?>