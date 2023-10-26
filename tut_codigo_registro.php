<?php
include("tut_conexion.php");
$v_nomb = $_POST['nombre'];
$v_espe = $_POST['especie'];
$v_precio = $_POST['precio'];

aniadir_datos($v_nomb, $v_espe, $v_precio); 

function aniadir_datos($v_nomb, $v_espe, $v_precio)
{
  global $conexion;

  if(!mysqli_query($conexion, "INSERT INTO usuario(nombre, especie, precio) VALUES ('".$v_nomb."','".$v_espe."','".$v_precio."')")){
    echo "ERROR";
  } else {
    echo "Acción exitosa";
  }
}
?>