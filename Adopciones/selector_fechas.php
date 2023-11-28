<form action="reportes.php" method="post" id="selector_fechas" style="display: none;">
    <label for="fechaInput">Selecciona una fecha de inicio:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" required><br>

    <label for="fechaInput">Selecciona una fecha de fin:</label>
    <input type="date" id="fecha_fin" name="fecha_fin" required>
    <button type="submit">Enviar</button>
</form>


<button id="boton_activar_formulario_selector_fechas" onclick="activarFormularioBuscador()">Buscador</button>

<script>
  function activarFormularioBuscador() {
    var formulario = document.getElementById("selector_fechas");
    formulario.style.display = "block";
  }
</script>