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
<header>
        <h1>Lista de Clientes</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../Mascotas/pag_principal.php">Mascotas</a></li>
            <li><a href="../Productos/pag_principal.php">Productos</a></li>
            <li><a href="../Adopciones/adopciones.php">Adopciones</a></li>
            <li><a href="../Clientes/clientes.php">Clientes</a></li>
            <li><a href="../Mi_cuenta/pag_principal.php">Mi cuenta</a></li>
        </ul>
    </nav>
<?php
include '../conexion.php';
include '../login/redirect_login.php';


session_start();
$rol_usuario = $_SESSION['rol_usuario'];

// Consulta para obtener todos los registros de la tabla "Clientes"
$regis_clientes = "SELECT * FROM clientes";
$result_clientes = $conn->query($regis_clientes);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Recibir datos de formulario de datos cambiados (cambiar_datos_registro.php)
    $columna_filtrar = $_POST["columna_filtrar"];
    $forma_filtrar = $_POST["forma_filtrar"];
    $regis_clientes = "SELECT * FROM clientes ORDER BY $columna_filtrar $forma_filtrar";
    //echo $regis_clientes;
    $result_clientes = $conn->query($regis_clientes);
}
include 'filtrar_datos.php';



if ($result_clientes->num_rows > 0) {
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Nombres</th>
    <th>apellidos</th>
    <th>numero_ci</th>
    <th>edad</th>
    <th>ingreso_bruto_mensual</th>";
    if ($rol_usuario == 1){
        echo "<th>Borrar</th>
        <th>Editar</th>";
    }
    echo "</tr>";
    while ($row = $result_clientes->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["id_cliente"] . "</td>
        <td>" . $row["nombres"] . "</td>
        <td>" . $row["apellidos"] . "</td>
        <td>" . $row["numero_ci"] . "</td>
        <td>" . $row["edad"] . "</td>
        <td>" . $row["ingreso_bruto_mensual"]. "</td>";
        if ($rol_usuario == 1){
            echo "<td>" . "
            <a class='boton_borrar' href='eliminar_registro.php?id=" . $row['id_cliente'] . "'>Borrar</a>" . "
            </td>
            <td>" . "
            <a class='boton_editar' href='cambiar_datos_registro.php?id=" . $row['id_cliente'] . "'>Editar</a>" . "
            </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla 'clientes'.";
}

if ($rol_usuario == 1){
    include 'formulario_agregar_registros.php';
}
include '../cerrar_conexion.php';
?>


</body>
</html>