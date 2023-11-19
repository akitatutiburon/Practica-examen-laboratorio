<?php
include '../conexion.php';


$id_registro = $_GET["id"];
//echo $id_registro;
$selecionar_registros_para_edicion = "SELECT * FROM productos WHERE id_producto = $id_registro";
$resultado = mysqli_query($conn, $selecionar_registros_para_edicion);
$registro = mysqli_fetch_assoc($resultado);

?>
<form action="actualizar_datos_registro.php" method="POST">
    <input type="hidden" name="id_producto" value="<?php echo $registro['id_producto']; ?>">
    <input type="text" name="campo1" placeholder="Nombre del producto" value="<?php echo $registro['nombre_producto']; ?>">
    <input type="text" name="campo2" placeholder="Descripción del producto" value="<?php echo $registro['descripcion_producto']; ?>">
    <input type="text" name="campo3" placeholder="Imágen" value="<?php echo $registro['imagen']; ?>"/>
    <input type="text" name="campo4" placeholder="Categoría de producto" value="<?php echo $registro['id_categoria']; ?>"/>
    <input type="text" name="campo5" placeholder="Cantidad" value="<?php echo $registro['cantidad']; ?>"/>
    <input type="submit" value="Guardar cambios">
</form>
<?php


include '../cerrar_conexion.php';
?>