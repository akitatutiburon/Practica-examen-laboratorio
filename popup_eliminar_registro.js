
// Por el momento inútil


function confirmarEliminacion() {
    var respuesta = confirm("¿Estás seguro de eliminar este registro de forma permanente?");
    
    if (respuesta) {
      // Si el usuario selecciona "sí, estoy seguro", redirige al usuario a otro documento
      window.location.href = "eliminar_registro.php";
    } else {
      // Si el usuario selecciona "no, cancelar", cierra el popup
      window.close();
    }
  }