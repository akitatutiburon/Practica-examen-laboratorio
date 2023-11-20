<?php
include '../conexion.php';

// Consulta SQL para obtener los registros de la tabla "mascotas" que se quieren filtrar
$sql1 = "SELECT id_clientes, edad, ingreso_bruto_mensual FROM clientes";
$result1 = $conn->query($sql1);

$id_clientes = "id_clientes";
$edad = "edad";
$ingreso_bruto_mensual = "ingreso_bruto_mensual";

$opciones_clientes = array();
array_push($opciones_clientes, $id_clientes, $edad, $ingreso_bruto_mensual);
//print_r($opciones_mascotas);
$cantidad_opciones1 = count($opciones_clientes);

$opciones_filtrado = array("ASC", "DESC");
$cantidad_opciones2 = count($opciones_filtrado);
?>

<form action="clientes.php" method="post" id="formulario_filtrado_mascotas" style="display: none;">
    Columna a filtrar: <select name="columna_filtrar" id="opcion">
    <?php
    // Generar opciones
    for ($i = 0; $i < $cantidad_opciones1; $i++) {
      $variable1 = $opciones_clientes[$i];
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


<button id="boton_activar_formulario_filtrado_mascotas" onclick="activarFormularioFiltrado()">Filtrar</button>

<script>
  function activarFormularioFiltrado() {
    var formulario = document.getElementById("formulario_filtrado_mascotas");
    formulario.style.display = "block";
  }
</script>