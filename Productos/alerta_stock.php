<style>
  p{
    color: darkred;
  }
  #mensaje {
    display: none;
    position: absolute;
    background-color: #f8f8f8;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
</style>

<p onmouseover="mostrar_alerta()" onmouseout="ocultar_alerta()" >!</p>

<div id="mensaje">Producto a punto de agotarse</div>

<script>
  function mostrar_alerta() {
    document.getElementById("mensaje").style.display = "block";
  }

  function ocultar_alerta() {
    document.getElementById("mensaje").style.display = "none";
  }
</script>