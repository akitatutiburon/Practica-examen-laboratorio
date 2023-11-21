
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../cesese.css">
    <!-- Imagen de Chimuelo 
        <img src="chimuelo.jfif" alt="Chimuelo"> 
    -->
    <title>Adopciones</title>


</head>
<body>
    <header>
        <h1>Lista de Adopciones</h1>
    </header>
    <nav>
        <ul>
            <li><a href="http://localhost/Practica-examen-laboratorio/Mascotas/pag_principal.php">Mascotas</a></li>
            <li><a href="http://localhost/Practica-examen-laboratorio/Productos/pag_principal.php">Productos</a></li>
            <li><a href="http://localhost/Practica-examen-laboratorio/Adopciones/adopciones.php">Adopciones</a></li>
            <li><a href="http://localhost/Practica-examen-laboratorio/Clientes/clientes.php">Clientes</a></li>
            <li><a href="http://localhost/Practica-examen-laboratorio/Mi_cuenta/pag_principal.php">Mi cuenta</a></li>
        </ul>
    </nav>

<?php
include '../conexion.php';
include '../login/redirect_login.php';

session_start();
$rol_usuario = $_SESSION['rol_usuario'];

// Consulta para obtener todos los registros de la tabla "adopciones"
$regis_adopciones = "SELECT * FROM adopciones";
$result_adopciones = $conn->query($regis_adopciones);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Recibir datos de formulario de datos cambiados (cambiar_datos_registro.php)
    $columna_filtrar = $_POST["columna_filtrar"];
    $forma_filtrar = $_POST["forma_filtrar"];
    $regis_adopciones = "SELECT * FROM adopciones ORDER BY $columna_filtrar $forma_filtrar";
    $result_adopciones = $conn->query($regis_adopciones);
}

include 'filtrar_datos.php';
// Verificar si hay registros y mostrarlos en una tabla
if ($result_adopciones->num_rows > 0) {
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Nombre del cliente</th>
    <th>Nombre de la mascota</th>
    <th>fecha</th>
    <th>estado_legal_adopcion</th>";
    if ($rol_usuario == 1){
        echo "<th>Borrar</th>
        <th>Editar</th>";
    }
    echo "</tr>";
    while ($row = $result_adopciones->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id_adopciones"] . "</td>
        <td>";
        if ($row["id_cliente"] !== " "){
            // Como funciona esto: Llamada a db/que cosas se llama/tabla/           condicion para llamar
            $get_nombres_id_cliente = "SELECT nombres, apellidos FROM clientes WHERE id_cliente = $row[id_cliente]";
            $resultado = mysqli_query($conn, $get_nombres_id_cliente);
            $fila = mysqli_fetch_assoc($resultado);
            echo $fila['nombres'] . " ". $fila['apellidos'];
        } else {
            echo "No se encontraron resultados.";
        }
        echo "</td>
        <td>";
        if ($row["id_mascota"] !== " "){
            $get_nombres_id_cliente = "SELECT nombre FROM mascotas WHERE id_mascota = $row[id_mascota]";
            $resultado = mysqli_query($conn, $get_nombres_id_cliente);
            $fila = mysqli_fetch_assoc($resultado);
            echo $fila['nombre'];
        } else {
            echo "No se encontraron resultados.";
        }
        echo "</td>
        <td>" . $row["fecha"] . "</td>
        <td>";
        if ($row["estado_legal_adopcion"] !== " "){
            $get_nombres_id_cliente = "SELECT nombre_estado_legal_adopcion FROM tabla_estado_legal_adopcion WHERE id_estado_legal_adopcion = $row[estado_legal_adopcion]";
            $resultado = mysqli_query($conn, $get_nombres_id_cliente);
            $fila = mysqli_fetch_assoc($resultado);
            echo $fila['nombre_estado_legal_adopcion'];
        } else {
            echo "No se encontraron resultados.";
        }
        echo "</td>";
        if ($rol_usuario == 1){
            echo "<td>" . "
            <a class='boton_borrar' href='eliminar_registro.php?id=" . $row['id_adopciones'] . "'>Borrar</a>" . "
            </td>
            <td>" . "
            <a class='boton_editar' href='cambiar_datos_registro.php?id=" . $row['id_adopciones'] . "'>Editar</a>" . "
            </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla 'adopciones'.";
}
if ($rol_usuario == 1){
    include 'formulario_agregar_registros.php';
}

include '../conexion.php';
?>


</body>
</html>