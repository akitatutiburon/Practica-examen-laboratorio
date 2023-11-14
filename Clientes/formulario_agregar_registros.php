<form action="agregar_registros.php" method="post" id="formulario_aniadir_registro" style="display: none;">
    id_mascota: <input type="hidden" name="id_cliente" /><br/>
    nombres: <input type="text" name="nombres" required/><br/>
    apellidos: <input type="text" name="apellidos" required/><br/>
    Número de C.I.: <input type="number" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}" name="numero_ci" required /><br/>
    edad: <input type="number" min="15" max="99" name="edad" required/><br/>
    Ingreso bruto mensual: <input type="number" name="ingreso_bruto_mensual" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" required /><br/> <!--  Poner obligatorio -->
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