<!DOCTYPE html>
<html>
  <style>
    form {
    margin: 0 auto;
    width: 50%;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f2f2f2;
    }

    form label {
      display: block;
      margin-bottom: 10px;
    }

    form input[type="text"],
    form input[type="password"],
    form textarea {
      width: 100%;
      padding: 10px 0px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    form input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    form input[type="submit"]:hover {
      background-color: #45a049;
    }

    h1 {
      text-align: center;
    }
  </style>

<h1>Inicio de sesión</h1>
<form action="verificacion_datos_login.php" method="post">
  <label for="usuario">Correo electrónico:</label><br>
  <input type="text" id="usuario" name="usuario"><br><br>
  <label for="contrasena">Contraseña:</label><br>
  <input type="password" id="contrasena" name="contrasena"><br><br>
  <input type="submit" value="Iniciar sesión">
</form>
</html>