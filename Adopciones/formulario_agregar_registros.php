<?php
include '../conexion.php';

// Consulta SQL para obtener los registros de la tabla "mascotas"
$sql1 = "SELECT id_mascota, nombre FROM mascotas";
$result1 = $conn->query($sql1);

$opciones_mascotas = array();
// Verificar si se encontraron registros
if ($result1->num_rows > 0) {
  // Recorrer los registros y almacenarlos
  while ($row1 = $result1->fetch_assoc()) {
    array_push($opciones_mascotas, $row1);
  }    
} else {
    echo "No se encontraron registros de mascotas.";
}
$cantidad_opciones1 = count($opciones_mascotas);
//echo $cantidad_opciones;

$sql2 = "SELECT id_cliente, nombres, apellidos FROM clientes";
$result2 = $conn->query($sql2);
$opciones_clientes = array();
if ($result2->num_rows > 0) {
  while ($row2 = $result2->fetch_assoc()) {
    array_push($opciones_clientes, $row2);
  }    
} else {
    echo "No se encontraron registros de clientes.";
}
$cantidad_opciones2 = count($opciones_clientes);

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

<form action="agregar_registros.php" method="post" id="formulario_aniadir_registro_adopciones" style="display: none;">
    id_adopciones : <input type="hidden" name="id_adopciones" /><br/>
    id_mascota : <select name="id_mascota" id="opcion">
    <?php
    // Generar opciones
    for ($i = 0; $i < $cantidad_opciones1; $i++) {
      $variable1 = $opciones_mascotas[$i]['nombre'];
      $dato1 = $opciones_mascotas[$i]['id_mascota'];
      echo "<option value=\"$dato1\">$variable1</option>";
    }
    ?>
    </select><br/>
    id_cliente : <select name="id_cliente" id="opcion">
    <?php
    for ($i = 0; $i < $cantidad_opciones2; $i++) {
      $variable2 = $opciones_clientes[$i]['nombres'];
      $dato2 = $opciones_clientes[$i]['id_cliente'];
      echo "<option value=\"$dato2\">$variable2</option>";
    }
    ?>
    </select><br/>
    fecha : <input type="datetime-local" name="fecha" required/><br/>
    estado_legal_adopcion : <select name="id_estado_legal_adopcion" id="opcion">
    <?php
    for ($i = 0; $i < $cantidad_opciones3; $i++) {
      $variable3 = $opciones_estado_legal_adopcion[$i]['nombre_estado_legal_adopcion'];
      $dato3 = $opciones_estado_legal_adopcion[$i]['id_estado_legal_adopcion'];
      echo "<option value=\"$dato3\">$variable3</option>";
    }
    ?>
    </select><br/>
    <input type="submit" value="Enviar"> 
    <input type="reset" value="Reset">
</form>


<button id="boton_activar_formulario_aniadir_registro_adopciones" onclick="activarFormulario()">Añadir registros</button>

<script>
  function activarFormulario() {
    var formulario = document.getElementById("formulario_aniadir_registro_adopciones");
    formulario.style.display = "block";
  }
</script>


<!-- Formato mas decente para el formulario, ver despues -->

<!-- <!DOCTYPE html>
<html>
<head>
  <title>Formulario de Registro de Mascotas</title>
  <style>
    /* Estilos para el último formulario */
    form:last-of-type {
      background-color: lightgray;
      padding: 20px;
      border-radius: 5px;
    }

    form:last-of-type label {
      display: block;
      margin-bottom: 10px;
    }

    form:last-of-type input,
    form:last-of-type textarea {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
    }

    form:last-of-type button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    form:last-of-type button:hover {
      background-color: #45a049;
    }
  </style>
</head>
</head>
<body>
  <h1>Formulario de Registro de Mascotas</h1>

  <form action="procesar_formulario_registro.php" method="POST">
    <label for="id_mascota">ID de Mascota:</label>
    <input type="text" id="id_mascota" name="id_mascota" hidden>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="especie">Especie:</label>
    <input type="text" id="especie" name="especie" required>

    <label for="raza">Raza:</label>
    <input type="text" id="raza" name="raza" required>

    <label for="edad">Edad:</label>
    <input type="text" id="edad" name="edad" required>

    <label for="genero">Género:</label>
    <input type="text" id="genero" name="genero" required>

    <label for="imagen">Imagen:</label>
    <input type="text" id="imagen" name="imagen" >

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" required></textarea>

    <label for="estado_salud">Estado de Salud:</label>
    <input type="text" id="estado_salud" name="estado_salud" required>

    <label for="estado_legal_mascota">Estado Legal de la Mascota:</label>
    <input type="text" id="estado_legal_mascota" name="estado_legal_mascota" required>

    <label for="precio">Precio:</label>
    <input type="text" id="precio" name="precio" required>

    <button type="submit">Enviar</button>
  </form>

</body>
</html> -->