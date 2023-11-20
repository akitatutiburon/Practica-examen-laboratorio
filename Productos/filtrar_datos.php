<?php
include '../conexion.php';

// Consulta SQL para obtener los registros de la tabla "mascotas" que se quieren filtrar
$sql1 = "SELECT id_producto, id_categoria, cantidad FROM productos";
$result1 = $conn->query($sql1);

$id_producto = "id_producto";
$id_categoria = "id_categoria";
$cantidad = "cantidad";

$opciones_productos = array();
array_push($opciones_productos, $id_producto, $id_categoria, $cantidad);
$cantidad_opciones1 = count($opciones_productos);

$opciones_filtrado = array("ASC", "DESC");
$cantidad_opciones2 = count($opciones_filtrado);
?>

<form action="pag_principal.php" method="post" id="formulario_filtrado_productos" style="display: none;">
    Columna a filtrar: <select name="columna_filtrar" id="opcion">
    <?php
    // Generar opciones
    for ($i = 0; $i < $cantidad_opciones1; $i++) {
      $variable1 = $opciones_productos[$i];
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


<button id="boton_activar_formulario_filtrado_productos" onclick="activarFormularioFiltrado()">Filtrar</button>

<script>
  function activarFormularioFiltrado() {
    var formulario = document.getElementById("formulario_filtrado_productos");
    formulario.style.display = "block";
  }
</script>