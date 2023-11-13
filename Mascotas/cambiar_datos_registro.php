<?php
include '../conexion.php';


$id_registro = $_GET["id"];
//echo $id_registro;
$selecionar_registros_para_edicion = "SELECT * FROM mascotas WHERE id_mascota = $id_registro";
$resultado = mysqli_query($conn, $selecionar_registros_para_edicion);
$registro = mysqli_fetch_assoc($resultado);

// Paso 3: Muestra los datos en un formulario
?>
<form action="actualizar_datos_registro.php" method="POST">
    <input type="hidden" name="id_mascota" value="<?php echo $registro['id_mascota']; ?>">
    <input type="text" name="campo1" placeholder="Nombre de la mascota" value="<?php echo $registro['nombre']; ?>">
    <input type="text" name="campo2" placeholder="Precio de la mascota" value="<?php echo $registro['precio']; ?>">
    <input type="text" name="campo3" placeholder="Especie" value="<?php echo $registro['especie']; ?>"/>
    <input type="text" name="campo4" placeholder="Raza" value="<?php echo $registro['raza']; ?>"/>
    <input type="text" name="campo5" placeholder="Edad" value="<?php echo $registro['edad']; ?>"/>
    <input type="text" name="campo6" placeholder="Género" value="<?php echo $registro['genero']; ?>"/> 
    <input type="text" name="campo7" placeholder="Direccion de imagen" value="<?php echo $registro['imagen']; ?>"/>
    <input type="text" name="campo8" placeholder="Descripción de la mascota" value="<?php echo $registro['descripcion']; ?>"/>
    <input type="text" name="campo9" placeholder="Estado de salud" value="<?php echo $registro['estado_salud']; ?>"/>
    <input type="text" name="campo10" placeholder="Estado legal" value="<?php echo $registro['estado_legal_mascota']; ?>"/>
    <input type="submit" value="Guardar cambios">
</form>
<?php


include '../cerrar_conexion.php';
?>