<form action="adopciones.php" id="formulario_buscar_datos" method="GET" style="display: none;">
  Categoría que desea buscar: <select name="categoria_busqueda" id="categoria_busqueda" required>
    <option value="id_mascota">Nombre de mascota</option>
    <option value="id_cliente">Nombre de cliente</option>
  </select><br>
  Término de busqueda: <input type="text" name="nombre_busqueda" placeholder="Ingrese el término de búsqueda" required>

  <input type="submit" value="Buscar">
</form>


<button id="boton_activar_formulario_buscar_datos" onclick="activarFormularioBuscador()">Buscador</button><br><br>

<script>
  function activarFormularioBuscador() {
    var formulario = document.getElementById("formulario_buscar_datos");
    formulario.style.display = "block";
  }
</script>