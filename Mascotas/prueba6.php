<?php
include '../conexion.php';

// Consulta SQL para obtener los registros de la tabla "mascotas"
$sql1 = "SELECT id_mascota, nombre, especie, edad, genero, estado_salud, estado_legal_mascota, precio FROM mascotas";
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
print_r($opciones_mascotas);
$cantidad_opciones1 = count($opciones_mascotas);
//echo $cantidad_opciones1;
//$cosa = key($opciones_mascotas[2][1]);
//echo $opciones_mascotas[2];
print_r($opciones_mascotas[1]);

switch ($opciones_mascotas[1]) {
  case 'id_mascota':
    echo 
    break;
  
  default:
    # code...
    break;
}










?>

<form action="agregar_registros.php" method="post" id="formulario_aniadir_registro_adopciones" style="display: none;">
    id_mascota : <select name="id_mascota" id="opcion">
    <?php
    // Generar opciones
    for ($i = 0; $i < $cantidad_opciones1; $i++) {
      $variable1 = key($opciones_mascotas[$i]);
      $dato1 = $opciones_mascotas[$i]['id_mascota'];
      echo "<option value=\"$dato1\">$variable1</option>";
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