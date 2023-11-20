<?php
include '../conexion.php';

// Consulta SQL para obtener los registros de la tabla "mascotas" que se quieren filtrar
$sql1 = "SELECT id_adopciones, id_mascota, id_cliente, fecha, estado_legal_adopcion FROM adopciones";
$result1 = $conn->query($sql1);

$id_adopciones = "id_adopciones";
$id_mascota = "id_mascota";
$id_cliente = "id_cliente";
$fecha = "fecha";
$estado_legal_adopcion = "estado_legal_adopcion";

$opciones_adopciones = array();
array_push($opciones_adopciones, $id_adopciones, $id_mascota, $id_cliente, $fecha, $estado_legal_adopcion);
//print_r($opciones_mascotas);
$cantidad_opciones1 = count($opciones_adopciones);

$opciones_filtrado = array("ASC", "DESC");
$cantidad_opciones2 = count($opciones_filtrado);
?>

<form action="adopciones.php" method="post" id="formulario_filtrado_adopciones" style="display: none;">
    Columna a filtrar: <select name="columna_filtrar" id="opcion">
    <?php
    // Generar opciones
    for ($i = 0; $i < $cantidad_opciones1; $i++) {
      $variable1 = $opciones_adopciones[$i];
      echo "<option value=\"$variable1\">$variable1</option>";
    }
    ?>
    </select><br/>
    Orden de filtrado: <select name="forma_filtrar" id="opcion">
    <?php
    // Generar opciones
    for ($i = 0; $i < $cantidad_opciones2; $i++) {
      $variable2 = $opciones_filtrado[$i];
      echo "<option value=\"$variable2\">$variable2</option>";
    }
    ?>
    </select><br/>
    <input type="submit" value="Enviar"> 
    <input type="reset" value="Reset">
</form>


<button id="formulario_filtrado_adopciones" onclick="activarFormularioFiltrado()">Filtrar</button>

<script>
  function activarFormularioFiltrado() {
    var formulario = document.getElementById("formulario_filtrado_adopciones");
    formulario.style.display = "block";
  }
</script>