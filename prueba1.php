<?php
include "conexion.php";

//$rol_usuario = "";

if(isset($_GET['id_usuario'])){
    $value_id_usuario = $_GET['id_usuario'];
    //echo $value_id_usuario. ": id_usuario ";

    $consulta_rol_usuario = "SELECT rol_usuario FROM usuarios WHERE id_usuario = $value_id_usuario";
    $resultado_consulta1 = mysqli_query($conn, $consulta_rol_usuario);
    $resultado_consulta1 = mysqli_fetch_assoc($resultado_consulta1);
    global $rol_usuario;
    $rol_usuario = $resultado_consulta1['rol_usuario'];
    //echo $rol_usuario. ": rol usuario";
}
echo $rol_usuario;
if(isset($_GET['id_usuario'])){
    $urlDestino = 'mascotas/pag_principal.php';
    header('Location: ' . $urlDestino);
}

//echo $rol_usuario;

?>