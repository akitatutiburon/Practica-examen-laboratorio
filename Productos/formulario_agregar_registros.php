<form action="agregar_registros.php" method="post" id="formulario_aniadir_registro" style="display: none;">
    id_producto: <input type="hidden" name="id_producto" /><br/>
    nombre: <input type="text" name="nombre_producto" required/><br/>
    Descripción: <input type="text" name="descripcion_producto" required/><br/>
    Imágen: <input type="text" name="imagen" default=""/><br/>
    ID categoría: <input type="text" name="id_categoria" required/><br/>
    Cantidad: <input type="number" name="cantidad" required /><br/>
    <input type="submit" value="Enviar"> 
    <input type="reset" value="Reset">
</form>


<button id="miBoton" onclick="activarFormulario()">Añadir registros</button>

<script>
  function activarFormulario() {
    var formulario = document.getElementById("formulario_aniadir_registro");
    formulario.style.display = "block";
  }
</script>
