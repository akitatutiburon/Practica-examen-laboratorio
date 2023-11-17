<?php
include '../conexion.php';


$id_registro = $_GET["id"];
//echo $id_registro;
$selecionar_registros_para_edicion = "SELECT * FROM adopciones WHERE id_adopciones = $id_registro";
$resultado = mysqli_query($conn, $selecionar_registros_para_edicion);
$registro = mysqli_fetch_assoc($resultado);

// Paso 3: Muestra los datos en un formulario
?>
<form action="actualizar_datos_registro.php" method="POST">
    <input type="hidden" name="id_adopcion" value="<?php echo $registro['id_adopciones']; ?>">
    <input type="text" name="campo1" placeholder="ID de mascota" value="<?php echo $registro['id_mascota']; ?> " required/>
    <input type="text" name="campo2" placeholder="ID del cliente" value="<?php echo $registro['id_cliente']; ?>" required/>
    <input type="datetime-local" name="campo3" placeholder="fecha" value="<?php echo $registro['fecha']; ?>" required/>
    <input type="text" name="campo4" placeholder="estado legal de la adopcion" value="<?php echo $registro['estado_legal_adopcion']; ?>" required/>
    <input type="submit" value="Guardar cambios">
</form>
<?php


include '../cerrar_conexion.php';
?>