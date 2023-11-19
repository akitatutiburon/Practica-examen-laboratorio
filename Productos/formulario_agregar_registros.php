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