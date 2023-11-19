
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../cesese.css">
    <title>Productos</title>


</head>
<body>
    <h1>Lista de Productos</h1>


<?php
include '../conexion.php';

$regis_productos = "SELECT * FROM productos";
$result_productos = $conn->query($regis_productos);

// Verificar si hay registros y mostrarlos en una tabla
if ($result_productos->num_rows > 0) {
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Imagén</th>
    <th>Categoría</th>
    <th>Cantidad</th>
    <th>Borrar</th>
    <th>Editar</th>
    </tr>";
    while ($row = $result_productos->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id_producto"] . "</td>
        <td>" . $row["nombre_producto"] . "</td>
        <td>" . $row["descripcion_producto"] . "</td>";
        echo "<td>";
        if($row["imagen"] == ""){
            echo "No hay imágen disponible";
        }
        echo "</td>";

        echo "<td>";
        switch ($row["id_categoria"]){
            case 1:
                echo "Comidas";
                break;
            case 2:
                echo "Juguetes";
                break;
            case 3:
                echo "Cuidados";
                break;
            default:
                echo "Error en ingreso de datos en base de datos";
                break;
        }
        echo "</td>";
        echo "<td>" . $row["cantidad"] . "</td>";
        echo "<td>" . "
        <a class='boton_borrar' href='eliminar_registro.php?id=" . $row['id_producto'] . "'>Borrar</a>" . "
        </td>
        <td>" . "
        <a class='boton_editar' href='cambiar_datos_registro.php?id=" . $row['id_producto'] . "'>Editar</a>" . "
        </td>

        </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla 'adopciones'.";
}
include 'formulario_agregar_registros.php';
include '../conexion.php';
?>


</body>
</html>