<?php
include '../conexion.php';

// Consulta SQL para obtener los registros de la tabla "mascotas" que se quieren filtrar
$sql1 = "SELECT id_mascota, nombre, especie, edad, genero, estado_salud, estado_legal_mascota, precio FROM mascotas";
$result1 = $conn->query($sql1);

$id_mascota = "id_mascota";
$nombre = "nombre";
$especie = "especie";
$edad = "edad";
$genero = "genero";
$estado_salud = "estado_salud";
$estado_legal_mascota = "estado_legal_mascota";
$precio = "precio";

$opciones_mascotas = array();
array_push($opciones_mascotas, $id_mascota, $nombre, $especie, $edad, $genero, $estado_salud, $estado_legal_mascota, $precio);
//print_r($opciones_mascotas);
$cantidad_opciones1 = count($opciones_mascotas);

$opciones_filtrado = array("ASC", "DESC");
$cantidad_opciones2 = count($opciones_filtrado);
?>

<form action="pag_principal.php" method="post" id="formulario_filtrado_mascotas" style="display: none;">
    Columna a filtrar: <select name="columna_filtrar" id="opcion">
    <?php
    // Generar opciones
    for ($i = 0; $i < $cantidad_opciones1; $i++) {
      $variable1 = $opciones_mascotas[$i];
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