<?php
include '../conexion.php';


// Obtener los valores enviados desde el formulario
$id_adopciones = $_POST['id_adopciones'];
$id_mascota = $_POST['id_mascota'];
$id_cliente = $_POST['id_cliente'];
$fecha = $_POST['fecha'];
$estado_legal_adopcion = $_POST['id_estado_legal_adopcion'];

// Crear la consulta SQL para insertar el registro en la tabla
$sql = "INSERT INTO  adopciones (`id_adopciones`, `id_mascota`, `id_cliente`, `fecha`, `estado_legal_adopcion`) VALUES ('$id_adopciones', '$id_mascota', '$id_cliente', '$fecha', '$estado_legal_adopcion')";

$consulta_edad_cliente = mysqli_query($conn, "SELECT edad FROM clientes WHERE id_cliente = $id_cliente");
// IBM == ingreso bruto mensual
$consulta_ibm_cliente = mysqli_query($conn, "SELECT ingreso_bruto_mensual FROM clientes WHERE id_cliente = $id_cliente");

$edad_cliente = 0;
if ($consulta_edad_cliente->num_rows > 0) {
  while ($row = $consulta_edad_cliente->fetch_assoc()) {
      //echo "La edad del cliente es: " . $row["edad"];
      $edad_cliente = $row['edad'];
  }
} else {
  echo "No se encontraron resultados.";
}

$ibm_cliente = 0;
if ($consulta_ibm_cliente->num_rows > 0) {
  while ($row = $consulta_ibm_cliente->fetch_assoc()) {
      //echo "La edad del cliente es: " . $row["ingreso_bruto_mensual"];
      $ibm_cliente = $row['ingreso_bruto_mensual'];
  }
} else {
  echo "No se encontraron resultados.";
}


if ($edad_cliente >= 18 AND $ibm_cliente >= 1000000){
  // Ejecutar la consulta SQL
  if (mysqli_query($conn, $sql)) {
    echo "Registro ingresado correctamente";
  } else {
    echo "Error al ingresar el registro: " . mysqli_error($conn);
  }
} else {
  $ibm_cliente_int = intval($ibm_cliente);
  $ibm_cliente_separado = number_format($ibm_cliente_int, 0, ".", "."); //Separar los números de a 3 con puntos
  //echo $ibm_cliente_separado;
  echo "No se puede actualizar. El cliente no cumple con los requsitos: \r Edad actual: " . $edad_cliente . " (mínimo 18) \r Ingreso bruto mensual: " . $ibm_cliente_separado . " (mínimo 1.000.000)";
}

include '../cerrar_conexion.php';
?>
<a class='boton_regresar' href='adopciones.php'></br>Entendido</a>