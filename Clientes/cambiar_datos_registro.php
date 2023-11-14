<?php
include '../conexion.php';


$id_registro = $_GET["id"];
//echo $id_registro;
$selecionar_registros_para_edicion = "SELECT * FROM clientes WHERE id_cliente = $id_registro";
$resultado = mysqli_query($conn, $selecionar_registros_para_edicion);
$registro = mysqli_fetch_assoc($resultado);

// Paso 3: Muestra los datos en un formulario
?>
<form action="actualizar_datos_registro.php" method="POST">
    <input type="hidden" name="id_mascota" value="<?php echo $registro['id_cliente']; ?>">
    <input type="text" name="campo1" placeholder="Nombre del cliente" value="<?php echo $registro['nombres']; ?>">
    <input type="text" name="campo2" placeholder="Apellidos del cliente" value="<?php echo $registro['apellidos']; ?>">
    <input type="text" name="campo3" placeholder="numero de C.I." value="<?php echo $registro['numero_ci']; ?>"/>
    <input type="text" name="campo4" placeholder="Edad" value="<?php echo $registro['edad']; ?>"/>
    <input type="text" name="campo5" placeholder="ingreso_bruto_mensual" value="<?php echo $registro['ingreso_bruto_mensual']; ?>"/>
    <input type="submit" value="Guardar cambios">
</form>
<?php


include '../cerrar_conexion.php';
?>