<?php
include '../conexion.php';

// Paso 4: Procesa los datos editados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Recibir datos de formulario de datos cambiados (cambiar_datos_registro.php)
  $id_registro = $_POST["id_adopcion"];
  $id_mascota = $_POST["campo1"];
  $id_cliente = $_POST["campo2"];
  $fecha = $_POST["campo3"];
  $estado_legal_adopcion = $_POST["campo4"];


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
  //echo $edad_cliente;

  $ibm_cliente = 0;
  if ($consulta_ibm_cliente->num_rows > 0) {
    while ($row = $consulta_ibm_cliente->fetch_assoc()) {
        //echo "La edad del cliente es: " . $row["ingreso_bruto_mensual"];
        $ibm_cliente = $row['ingreso_bruto_mensual'];
    }
  } else {
    echo "No se encontraron resultados.";
  }
  //echo $ibm_cliente;

  $sql = "UPDATE adopciones SET id_mascota = '$id_mascota', 
  id_cliente = '$id_cliente', 
  fecha = '$fecha', 
  estado_legal_adopcion = '$estado_legal_adopcion' WHERE id_adopciones = $id_registro";



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
}

include '../cerrar_conexion.php';
?>
<a class='boton_regresar' href='adopciones.php'> </br>Entendido</a>