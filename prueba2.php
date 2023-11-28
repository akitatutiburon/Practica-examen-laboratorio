<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Estilo para el cuadro de texto que aparecerá */
    #mensaje {
      display: none;
      position: absolute;
      background-color: #f8f8f8;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
  </style>
  <title>Ejemplo de Producto Agotándose</title>
</head>
<body>

  <!-- Texto que activará el mensaje al pasar el ratón por encima -->
  <p onmouseover="mostrarMensaje()" onmouseout="ocultarMensaje()">Producto en oferta</p>

  <!-- Cuadro de texto que aparecerá al pasar el ratón por encima del texto -->
  <div id="mensaje">Producto a punto de agotarse</div>

  <script>
    // Función para mostrar el mensaje
    function mostrarMensaje() {
      document.getElementById("mensaje").style.display = "block";
    }

    // Función para ocultar el mensaje
    function ocultarMensaje() {
      document.getElementById("mensaje").style.display = "none";
    }
  </script>

</body>
</html>
