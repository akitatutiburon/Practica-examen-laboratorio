<?php

// -- Conectar con base de datos de phpmyadmin --
$servidor = 'localhost';
$usuario = "root";
$clave = "";
$base_datos = "tienda_mascotas";

$conexion = new mysqli($servidor, $usuario, $clave, $base_datos);

if($conexion->connect_errno){
  die("conexión fallida". $conexion->connect_errno);
} else {
  echo "conectado";
}

// include("insertar_datos.php");
// $v_nomb = $_POST['nombre'];
// $v_espe = $_POST['especie'];
// $v_precio = $_POST['precio'];

// aniadir_datos($v_nomb, $v_espe, $v_precio); 

// function aniadir_datos($v_nomb, $v_espe, $v_precio)
// {
//   global $conexion;

//   if(!mysqli_query($conexion, "INSERT INTO usuario(nombre, especie, precio) VALUES ('".$v_nomb."','".$v_espe."','".$v_precio."')")){
//     echo "ERROR";
//   } else {
//     echo "Acción exitosa";
//   }
// }

?>




<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="cesese.css">
</head>
<header>
  <p1>Esta es la cabezera</p1>

</header>
<body>
<!-- 
<form method="post">
<input type="text" id="nombre" name="nombre" require placeholder="Nombre(s)"/>
<input type="text" id="especie" name="especie" require placeholder="Especie"/>
<input type="text" id="Raza" name="Raza" require placeholder="Raza"/>
<button type="submit"> Registrar mascota </button> -->



<h1>Listas de datos</h1>
<p>Esto NO es la cabecera</p>


    <!-- Sidebar -->
    <!-- <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
    <h3 class="w3-bar-item">Menu</h3>
    <a href="#" class="w3-bar-item w3-button">Link 1</a>
    <a href="#" class="w3-bar-item w3-button">Link 2</a>
    <a href="#" class="w3-bar-item w3-button">Link 3</a>
  </div>

   Page Content 
  <div style="margin-left:25%">

  <div class="w3-container w3-teal">
    <h1>My Page</h1>
  </div>

  <img src="" alt="Car" style="width:100%">

  <div class="w3-container">
  <h2>Sidebar Navigation Example</h2>
  <p>The sidebar with is set with style="width:25%".</p>
  <p>The left margin of the page content is set to the same value.</p>
  </div>

  </div> -->

<table border="1">
  <tr><!-- Filas de tabla -->
    <td>Celda 1</td><!-- Columnas de tabla -->
    <td>Celda 2</td>
    <td>Celda 3</td>
    <td><td-editar>Editar</td-editar></td><!-- Para colocar un tipo específico de css tenés que meter dentro de la categoría -->
    <td><button type="submit">Borrar</td>
  </tr>
  <tr>
    <td>Celda 4</td>
    <td>Celda 5</td>
    <td>Celda 6</td>
    <td>Editar</td>
    <td>Borrar</td>
  </tr>
</table>
</body>
</html>
