
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../cesese.css">
    <title>Productos</title>


</head>
<body>
    <header>
        <h1>Lista de Productos</h1>
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

$regis_productos = "SELECT * FROM productos";
$result_productos = $conn->query($regis_productos);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Recibir datos de formulario de datos cambiados (cambiar_datos_registro.php)
    $columna_filtrar = $_POST["columna_filtrar"];
    $forma_filtrar = $_POST["forma_filtrar"];
    $regis_productos = "SELECT * FROM productos ORDER BY $columna_filtrar $forma_filtrar";
    $result_productos = $conn->query($regis_productos);
}


include 'filtrar_datos.php';
// Verificar si hay registros y mostrarlos en una tabla
if ($result_productos->num_rows > 0) {
    echo "<colgroup>
        <col span='1' style='background-color:red'>
        <col style='background-color:yellow'>
    </colgroup>";
    echo "<table>";
    echo "<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Imagén</th>
    <th>Categoría</th>
    <th>Cantidad</th>";
    if ($rol_usuario == 1){
        echo "<th>Borrar</th>
        <th>Editar</th>";
    }
    echo "</tr>";
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
        if ($rol_usuario == 1){
            echo "<td>" . "
            <a class='boton_borrar' href='eliminar_registro.php?id=" . $row['id_producto'] . "'>Borrar</a>" . "
            </td>
            <td>" . "
            <a class='boton_editar' href='cambiar_datos_registro.php?id=" . $row['id_producto'] . "'>Editar</a>" . "
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