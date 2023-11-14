<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../cesese.css">
    <!-- Imagen de Chimuelo 
        <img src="chimuelo.jfif" alt="Chimuelo"> 
    -->
    <title>Clientes</title>


</head>
<body>
    <h1>Lista de Clientes</h1>

<?php
include '../conexion.php';
// Consulta para obtener todos los registros de la tabla "Clientes"
$regis_clientes = "SELECT * FROM clientes";
$result_clientes = $conn->query($regis_clientes);

if ($result_clientes->num_rows > 0) {
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Nombres</th>
    <th>apellidos</th>
    <th>numero_ci</th>
    <th>edad</th>
    <th>ingreso_bruto_mensual</th>
    <th>Borrar</th>
    <th>Editar</th>
    </tr>";
    while ($row = $result_clientes->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id_cliente"] . "</td>
        <td>" . $row["nombres"] . "</td>
        <td>" . $row["apellidos"] . "</td>
        <td>" . $row["numero_ci"] . "</td>
        <td>" . $row["edad"] . "</td>
        <td>" . $row["ingreso_bruto_mensual"]. "</td>
        <td>" . "
        <a class='boton_borrar' href='eliminar_registro.php?id=" . $row['id_cliente'] . "'>Borrar</a>" . "
        </td>
        <td>" . "
        <a class='boton_editar' href='cambiar_datos_registro.php?id=" . $row['id_cliente'] . "'>Editar</a>" . "
        </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla 'adopciones'.";
}


include 'formulario_agregar_registros.php';
include '../cerrar_conexion.php';
?>


</body>
</html>