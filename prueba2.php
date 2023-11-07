<!doctype html>
<html>
<body>

<form action="prueba.php" method="post">
  id_mascota : <input type="hidden" name="id_mascota" /><br/>
  nombre : <input type="text" name="nombre" required/><br/>
  especie : <input type="text" name="especie" required/><br/>
  raza: <input type="text" name="raza" /><br/>
  edad : <input type="text" name="edad" /><br/>
  genero : <input type="text" name="genero" required /><br/> <!--  Poner obligatorio -->
  imagen: <input type="text" name="imagen" /><br/>
  descripcion : <input type="text" name="descripcion" required/><br/>
  estado_salud : <input type="text" name="estado_salud" required /><br/> <!--  Poner obligatorio -->
  estado_legal_mascota: <input type="text" name="estado_legal_mascota" required /><br/> <!--  Poner obligatorio -->
  precio: <input type="text" name="precio" required/><br/>
  <input type="submit" value="Enviar"> 
  <input type="reset" value="Reset">
</form>

</html>
</body>